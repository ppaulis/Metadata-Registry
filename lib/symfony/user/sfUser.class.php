<?php

/*
 * This file is part of the symfony package.
 * (c) 2004-2006 Fabien Potencier <fabien.potencier@symfony-project.com>
 * (c) 2004-2006 Sean Kerr <sean@code-box.org>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 *
 * sfUser wraps a client session and provides accessor methods for user
 * attributes. It also makes storing and retrieving multiple page form data
 * rather easy by allowing user attributes to be stored in namespaces, which
 * help organize data.
 *
 * @package    symfony
 * @subpackage user
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @author     Sean Kerr <sean@code-box.org>
 * @version    SVN: $Id: sfUser.class.php 415 2008-04-04 19:30:57Z jphipps $
 */
class sfUser
{
  /**
   * The namespace under which attributes will be stored.
   */
  const ATTRIBUTE_NAMESPACE = 'symfony/user/sfUser/attributes';

  const CULTURE_NAMESPACE = 'symfony/user/sfUser/culture';

  /**
   * @var sfParameterHolder $parameterHolder
   */
  /**
   * @var sfParameterHolder $attributeHolder
   */
  /**
   * @var string $culture
   */
  /**
   * @var sfContext $context
   */
  protected
    $parameterHolder = null,
    $attributeHolder = null,
    $culture         = null,
    $context         = null;

  /**
   * Retrieve the current application context.
   *
   * @return Context A Context instance.
   */
  public function getContext()
  {
    return $this->context;
  }

  /**
   * Initialize this User.
   *
   * @param sfContext $context  A Context instance.
   * @param array  $parameters An associative array of initialization parameters.
   *
   * @return bool true, if initialization completes successfully, otherwise
   *              false.
   *
   * @throws <b>sfInitializationException</b> If an error occurs while initializing this User.
   */
  public function initialize($context, $parameters = array())
  {
    $this->context = $context;

    $this->parameterHolder = new sfParameterHolder();
    $this->parameterHolder->add($parameters);

    $this->attributeHolder = new sfParameterHolder(self::ATTRIBUTE_NAMESPACE);

    // read attributes from storage
    $attributes = $context->getStorage()->read(self::ATTRIBUTE_NAMESPACE);
    if (is_array($attributes))
    {
      foreach ($attributes as $namespace => $values)
      {
        $this->attributeHolder->add($values, $namespace);
      }
    }

    // set the user culture to sf_culture parameter if present in the request
    // otherwise
    //  - use the culture defined in the user session
    //  - use the default culture set in i18n.yml
    if (!($culture = $context->getRequest()->getParameter('sf_culture')))
    {
      if (null === ($culture = $context->getStorage()->read(self::CULTURE_NAMESPACE)))
      {
        $culture = sfConfig::get('sf_i18n_default_culture', 'en');
      }
    }

    $this->setCulture($culture);
  }

  /**
   * Retrieve a new sfUser implementation instance.
   *
   * @param string $class A sfUser implementation name
   *
   * @return User A sfUser implementation instance.
   *
   * @throws <b>sfFactoryException</b> If a user implementation instance cannot
   */
  public static function newInstance($class)
  {
    // the class exists
    $object = new $class();

    if (!($object instanceof sfUser))
    {
      // the class name is of the wrong type
      $error = 'Class "%s" is not of the type sfUser';
      $error = sprintf($error, $class);

      throw new sfFactoryException($error);
    }

    return $object;
  }

  /**
   * Sets culture.
   *
   * @param  string $culture culture
   */
  public function setCulture($culture)
  {
    if ($this->culture != $culture)
    {
      $this->culture = $culture;

      // change the message format object with the new culture
      if (sfConfig::get('sf_i18n'))
      {
        $this->context->getI18N()->setCulture($culture);
      }

      // add the culture in the routing default parameters
      sfConfig::set('sf_routing_defaults', array_merge((array) sfConfig::get('sf_routing_defaults'), array('sf_culture' => $culture)));
    }
  }

  /**
   * Gets culture.
   *
   * @return string
   */
  public function getCulture()
  {
    return $this->culture;
  }

  /**
   * @return sfParameterHolder
   */
  public function getParameterHolder()
  {
    return $this->parameterHolder;
  }

  /**
   * @return sfParameterHolder
   */
  public function getAttributeHolder()
  {
    return $this->attributeHolder;
  }

  /**
   * @param string $name
   * @param string $default
   * @param string $ns
   *
   * @return mixed
   */
  public function getAttribute($name, $default = null, $ns = null)
  {
    return $this->attributeHolder->get($name, $default, $ns);
  }

  /**
   * @param  string $name
   * @param string $ns
   *
   * @return mixed
   */
  public function hasAttribute($name, $ns = null)
  {
    return $this->attributeHolder->has($name, $ns);
  }

  /**
   * @param   string   $name
   * @param   string   $value
   * @param string $ns
   *
   * @return mixed
   */
  public function setAttribute($name, $value, $ns = null)
  {
    return $this->attributeHolder->set($name, $value, $ns);
  }

  /**
   * @param   string   $name
   * @param string $default
   * @param string $ns
   *
   * @return mixed
   */
  public function getParameter($name, $default = null, $ns = null)
  {
    return $this->parameterHolder->get($name, $default, $ns);
  }

  /**
   * @param  string    $name
   * @param string $ns
   *
   * @return mixed
   */
  public function hasParameter($name, $ns = null)
  {
    return $this->parameterHolder->has($name, $ns);
  }

  /**
   * @param   string   $name
   * @param   string   $value
   * @param string $ns
   *
   * @return mixed
   */
  public function setParameter($name, $value, $ns = null)
  {
    return $this->parameterHolder->set($name, $value, $ns);
  }

  /**
   * Execute the shutdown procedure.
   *
   * @return void
   */
  public function shutdown()
  {
    $storage = $this->getContext()->getStorage();

    $attributes = array();
    foreach ($this->attributeHolder->getNamespaces() as $namespace)
    {
      $attributes[$namespace] = $this->attributeHolder->getAll($namespace);
    }

    // write attributes to the storage
    $storage->write(self::ATTRIBUTE_NAMESPACE, $attributes);

    // write culture to the storage
    $storage->write(self::CULTURE_NAMESPACE, $this->culture);

    session_write_close();
  }

  /**
   * @param string $method
   * @param array $arguments
   *
   * @return mixed
   * @throws sfException
   */
  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('sfUser:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method sfUser::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }
}
