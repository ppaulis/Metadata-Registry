<?php
// auto-generated by sfPropelAdmin
// date: 2015/01/27 16:41:38
?>
<ul class="sf_admin_actions">

  <li><?php echo submit_tag(
        __( 'Get CSV' ),
        array (
            'name'  => 'getCSV',
            'title' => 'Get CSV',
            'style' => 'background: #ffc url(/jpAdminPlugin/images/csv_text.png) no-repeat 2px 3px; padding-left:20px !important',
        )
    ) ?></li>
  <li><?php echo button_to(
        __( 'Get RDF' ),
        '@rdf_schema?id=' . $schema->getId(),
        array (
            'title' => 'showRdf',
            'style' => 'background: #ffc url(/jpAdminPlugin/images/rdf_icon.png) no-repeat 2px 3px; padding-left:20px !important',
        )
    ) ?></li>
</ul>
