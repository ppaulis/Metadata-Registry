<?php echo '<?xml version="1.0" encoding = "UTF-8"?>';
$ts = ($timestamp) ? '/ts/' . date('YmdHis',$timestamp) : ''; ?>
<xs:schema
    xmlns:xs="http://www.w3.org/2001/XMLSchema"
    xmlns="<?php echo $vocabulary->getUri() . $ts; ?>"
    targetNamespace="<?php echo $vocabulary->getUri(); ?>"
    xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
    elementFormDefault="qualified"
    attributeFormDefault="unqualified"
    version="1.00.000">

    <xs:annotation>
        <xs:documentation xml:lang="en">
            <?php echo htmlspecialchars(html_entity_decode($vocabulary->getName(), ENT_QUOTES | ENT_HTML5, 'UTF-8')); ?> XML Schema
            XML Schema for <?php echo $vocabulary->getUri() . $ts; ?> namespace
            Date created: <?php echo $vocabulary->getCreatedAt() . "\n" ?>
            Date of last update: <?php echo $vocabulary->getLastUpdated() . "\n" ?>
<?php if ($vocabulary->getNote()): ?>
            <?php echo htmlspecialchars(html_entity_decode($vocabulary->getNote(), ENT_QUOTES | ENT_HTML5, 'UTF-8'))  . "\n" ?>
<?php endif; ?>
            Further information about this Vocabulary is available at <?php echo $vocabulary->getUri() . ".html\n" ?>
        </xs:documentation>
<?php if ($timestamp): ?>
        <xs:documentation xml:lang="en">
            NOTICE: This is a TimeSlice of this Vocabulary as of:
                    <?php echo date(DATE_W3C, $timestamp) ?>.
            The most current complete Vocabulary may be retrieved from:
                    <?php echo $vocabulary->getUri() ?>
        </xs:documentation>
<?php endif; ?>
    </xs:annotation>

    <xs:simpleType name="DCMIType">
        <xs:restriction base="xs:string">
<?php foreach ($concepts as $concept): ?>
            <xs:enumeration value="<?php echo htmlspecialchars(html_entity_decode($concept->getPrefLabel(), ENT_QUOTES | ENT_HTML5, 'UTF-8')); ?>"/>
<?php endforeach; ?>
        </xs:restriction>
    </xs:simpleType>

</xs:schema>
