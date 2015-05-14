#
# SQL Export
# Created by Querious (974)
# Created: May 7, 2015 at 5:27:14 PM EDT
# Encoding: Unicode (UTF-8)
#


DROP TABLE IF EXISTS `schema_has_version`;
DROP TABLE IF EXISTS `schema_has_user`;
DROP TABLE IF EXISTS `reg_schema_property_element_history`;
DROP TABLE IF EXISTS `reg_schema_property_element`;
DROP TABLE IF EXISTS `reg_schema_property`;
DROP TABLE IF EXISTS `reg_rdf_namespace`;
DROP TABLE IF EXISTS `reg_schema`;
DROP TABLE IF EXISTS `reg_user`;
DROP TABLE IF EXISTS `reg_status`;
DROP TABLE IF EXISTS `reg_prefix`;
DROP TABLE IF EXISTS `reg_lookup`;
DROP TABLE IF EXISTS `reg_file_import_history`;
DROP TABLE IF EXISTS `reg_batch`;
DROP TABLE IF EXISTS `reg_agent_has_user`;
DROP TABLE IF EXISTS `profile_property`;
DROP TABLE IF EXISTS `profile`;
DROP TABLE IF EXISTS `reg_agent`;


CREATE TABLE `reg_agent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime DEFAULT NULL,
  `last_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL,
  `org_email` varchar(100) NOT NULL DEFAULT '',
  `org_name` varchar(255) NOT NULL DEFAULT '',
  `ind_affiliation` varchar(255) DEFAULT NULL,
  `ind_role` varchar(45) DEFAULT NULL,
  `address1` varchar(255) DEFAULT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `state` char(2) DEFAULT NULL,
  `postal_code` varchar(15) DEFAULT NULL,
  `country` char(3) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `web_address` varchar(255) DEFAULT NULL,
  `type` char(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=178 DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=1820 COMMENT='InnoDB free: 0 kB';


CREATE TABLE `profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `agent_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `child_updated_at` datetime DEFAULT NULL,
  `child_updated_by` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL DEFAULT '',
  `note` text,
  `uri` varchar(255) NOT NULL DEFAULT '',
  `url` varchar(255) DEFAULT NULL,
  `base_domain` varchar(255) NOT NULL DEFAULT '',
  `token` varchar(45) NOT NULL DEFAULT '',
  `community` varchar(45) DEFAULT NULL,
  `last_uri_id` int(11) DEFAULT '100000',
  `status_id` int(11) NOT NULL DEFAULT '1',
  `language` char(6) NOT NULL DEFAULT 'en',
  UNIQUE KEY `profile_id` (`id`),
  KEY `profile_agent_id` (`agent_id`),
  KEY `profile_status_id` (`status_id`),
  KEY `profile_updated_by` (`updated_by`),
  KEY `profile_created_by` (`created_by`),
  KEY `profile_deleted_by` (`deleted_by`),
  KEY `profile_child_updated_by` (`child_updated_by`),
  FOREIGN KEY (`agent_id`) REFERENCES `reg_agent` (`id`) ON UPDATE NO ACTION,
  FOREIGN KEY (`status_id`) REFERENCES `reg_status` (`id`),
  FOREIGN KEY (`updated_by`) REFERENCES `reg_user` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  FOREIGN KEY (`created_by`) REFERENCES `reg_user` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  FOREIGN KEY (`deleted_by`) REFERENCES `reg_user` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  FOREIGN KEY (`child_updated_by`) REFERENCES `reg_user` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;


CREATE TABLE `profile_property` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `profile_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT '',
  `label` varchar(255) NOT NULL DEFAULT '',
  `definition` text,
  `comment` text,
  `type` enum('property','subproperty','class','subclass') NOT NULL DEFAULT 'property',
  `uri` varchar(255) DEFAULT NULL,
  `status_id` int(11) NOT NULL DEFAULT '1',
  `language` varchar(6) NOT NULL DEFAULT 'en',
  `note` text,
  `display_order` int(11) DEFAULT NULL COMMENT 'Display order of properties',
  `export_order` int(11) DEFAULT NULL COMMENT 'Display order of properties',
  `picklist_order` int(11) DEFAULT NULL,
  `examples` varchar(255) DEFAULT NULL COMMENT 'Link to example usage',
  `is_required` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'boolean -- id this value required',
  `is_reciprocal` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'boolean - subject and object must both have this property',
  `is_singleton` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'boolean -- is this property allowed to repeat for a concept',
  `is_in_picklist` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'boolean - is in the property picklist',
  `is_in_export` tinyint(1) NOT NULL DEFAULT '1',
  `inverse_profile_property_id` int(11) DEFAULT NULL COMMENT 'id of the inverse property',
  `is_in_class_picklist` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'boolean - is in the property picklist',
  `is_in_property_picklist` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'boolean - is in the property picklist',
  `is_in_rdf` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'boolean - should this display in the RDF',
  `is_in_xsd` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'boolean - should this display in the XSD',
  `is_attribute` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'boolean - is this an attribute? attribute''s aren''t editable outside the main form',
  `has_language` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Boolean that determines whether language attribute is displayed for this property',
  `is_object_prop` tinyint(1) NOT NULL DEFAULT '1',
  `is_in_form` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `profile_property_status_id` (`status_id`),
  KEY `profile_property_updated_by` (`updated_by`),
  KEY `profile_property_created_by` (`created_by`),
  KEY `profile_property_deleted_by` (`deleted_by`),
  KEY `inverse_profile_property_id` (`inverse_profile_property_id`),
  KEY `profile_id` (`profile_id`) USING BTREE,
  FOREIGN KEY (`profile_id`) REFERENCES `profile` (`id`) ON UPDATE NO ACTION,
  FOREIGN KEY (`inverse_profile_property_id`) REFERENCES `profile_property` (`id`),
  FOREIGN KEY (`status_id`) REFERENCES `reg_status` (`id`),
  FOREIGN KEY (`updated_by`) REFERENCES `reg_user` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  FOREIGN KEY (`created_by`) REFERENCES `reg_user` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  FOREIGN KEY (`deleted_by`) REFERENCES `reg_user` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=1170;


CREATE TABLE `reg_agent_has_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `agent_id` int(11) NOT NULL DEFAULT '0',
  `is_registrar_for` tinyint(1) DEFAULT '1',
  `is_admin_for` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_agent_id` (`user_id`,`agent_id`),
  UNIQUE KEY `agent_user_id` (`agent_id`,`user_id`),
  FOREIGN KEY (`user_id`) REFERENCES `reg_user` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  FOREIGN KEY (`agent_id`) REFERENCES `reg_agent` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=172 DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=1092 COMMENT='InnoDB free: 0 kB; ';


CREATE TABLE `reg_batch` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `run_time` datetime DEFAULT NULL,
  `run_description` text CHARACTER SET latin1,
  `object_type` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `object_id` int(11) DEFAULT NULL,
  `event_time` datetime DEFAULT NULL,
  `event_type` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `event_description` text CHARACTER SET latin1,
  `registry_uri` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=331 PACK_KEYS=0 ROW_FORMAT=COMPACT COMMENT='InnoDB free: 5120 kB';


CREATE TABLE `reg_file_import_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `map` text COMMENT 'stores the serialized column map array',
  `user_id` int(11) DEFAULT NULL,
  `vocabulary_id` int(11) DEFAULT NULL,
  `schema_id` int(11) DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `source_file_name` varchar(255) DEFAULT NULL,
  `file_type` varchar(30) DEFAULT NULL,
  `batch_id` int(11) DEFAULT NULL,
  `results` text COMMENT 'stores the serialized results of the import',
  `total_processed_count` int(11) DEFAULT NULL,
  `error_count` int(11) DEFAULT NULL,
  `success_count` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `vocabulary_id` (`vocabulary_id`),
  KEY `schema_id` (`schema_id`),
  KEY `batch_id` (`batch_id`),
  FOREIGN KEY (`user_id`) REFERENCES `reg_user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  FOREIGN KEY (`vocabulary_id`) REFERENCES `reg_vocabulary` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  FOREIGN KEY (`schema_id`) REFERENCES `reg_schema` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  FOREIGN KEY (`batch_id`) REFERENCES `reg_batch` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=utf8 PACK_KEYS=0 ROW_FORMAT=COMPACT;


CREATE TABLE `reg_lookup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_id` int(11) DEFAULT NULL COMMENT 'This will be the lookup type and will reference the list of lookup types stored in this very same table',
  `short_value` char(20) DEFAULT NULL,
  `long_value` varchar(255) DEFAULT NULL,
  `display_order` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `display_order` (`type_id`,`display_order`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;


CREATE TABLE `reg_prefix` (
  `prefix` varchar(40) NOT NULL,
  `uri` varchar(256) DEFAULT NULL,
  `rank` int(11) DEFAULT '0',
  PRIMARY KEY (`prefix`),
  KEY `prefix_uri` (`uri`(255)),
  KEY `prefix_rank` (`rank`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `reg_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `display_order` int(11) DEFAULT NULL,
  `display_name` varchar(255) DEFAULT NULL,
  `uri` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `display_order` (`display_order`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;


CREATE TABLE `reg_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime DEFAULT NULL,
  `last_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL,
  `nickname` varchar(50) DEFAULT NULL,
  `salutation` varchar(5) DEFAULT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `sha1_password` varchar(40) DEFAULT NULL,
  `salt` varchar(32) DEFAULT NULL,
  `want_to_be_moderator` tinyint(1) DEFAULT '0',
  `is_moderator` tinyint(1) DEFAULT '0',
  `is_administrator` tinyint(1) DEFAULT '0',
  `deletions` int(11) DEFAULT '0',
  `password` varchar(40) DEFAULT NULL,
  `culture` varchar(7) DEFAULT 'en_US',
  PRIMARY KEY (`id`),
  KEY `id` (`id`,`created_at`)
) ENGINE=InnoDB AUTO_INCREMENT=423 DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=606 COMMENT='InnoDB free: 0 kB';


CREATE TABLE `reg_schema` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `agent_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_user_id` int(11) DEFAULT NULL,
  `updated_user_id` int(11) DEFAULT NULL,
  `child_updated_at` datetime DEFAULT NULL,
  `child_updated_user_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL DEFAULT '',
  `note` text,
  `uri` varchar(255) NOT NULL DEFAULT '',
  `url` varchar(255) DEFAULT NULL,
  `base_domain` varchar(255) NOT NULL DEFAULT '',
  `token` varchar(45) NOT NULL DEFAULT '',
  `community` varchar(45) DEFAULT NULL,
  `last_uri_id` int(11) DEFAULT '100000',
  `status_id` int(11) NOT NULL DEFAULT '1',
  `language` char(6) NOT NULL DEFAULT 'en',
  `profile_id` int(11) DEFAULT NULL,
  `ns_type` char(6) NOT NULL DEFAULT 'slash',
  `prefixes` text,
  `languages` text,
  `repo` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `agent_id` (`agent_id`),
  KEY `status_id` (`status_id`),
  KEY `last_updated_by_user_id` (`updated_user_id`),
  KEY `created_user_id` (`created_user_id`),
  KEY `child_updated_user_id` (`child_updated_user_id`),
  KEY `profile_id` (`profile_id`),
  KEY `reg_schema_idx1` (`uri`),
  KEY `reg_schema_idx2` (`name`),
  FOREIGN KEY (`created_user_id`) REFERENCES `reg_user` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  FOREIGN KEY (`updated_user_id`) REFERENCES `reg_user` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  FOREIGN KEY (`agent_id`) REFERENCES `reg_agent` (`id`) ON UPDATE NO ACTION,
  FOREIGN KEY (`profile_id`) REFERENCES `profile` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  FOREIGN KEY (`status_id`) REFERENCES `reg_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=16384 PACK_KEYS=0 ROW_FORMAT=COMPACT COMMENT='InnoDB free: 0 kB; ';


CREATE TABLE `reg_rdf_namespace` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `schema_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_user_id` int(11) DEFAULT NULL,
  `updated_user_id` int(11) DEFAULT NULL,
  `token` varchar(255) NOT NULL DEFAULT '',
  `note` text,
  `uri` varchar(255) NOT NULL DEFAULT '',
  `schema_location` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `schema_id` (`schema_id`),
  FOREIGN KEY (`schema_id`) REFERENCES `reg_schema` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 PACK_KEYS=0 ROW_FORMAT=COMPACT;


CREATE TABLE `reg_schema_property` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL,
  `created_user_id` int(11) DEFAULT NULL,
  `updated_user_id` int(11) DEFAULT NULL,
  `schema_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `label` varchar(255) NOT NULL,
  `definition` text,
  `comment` text,
  `type` enum('property','subproperty','class','subclass') NOT NULL DEFAULT 'property',
  `is_subproperty_of` int(11) DEFAULT NULL,
  `parent_uri` varchar(255) DEFAULT NULL,
  `uri` varchar(255) NOT NULL,
  `status_id` int(11) NOT NULL DEFAULT '1',
  `language` varchar(6) NOT NULL,
  `note` text,
  `domain` varchar(255) DEFAULT NULL,
  `orange` varchar(255) DEFAULT NULL,
  `is_deprecated` tinyint(1) DEFAULT NULL COMMENT 'Boolean. Has this class/property been deprecated',
  `url` varchar(255) DEFAULT NULL,
  `lexical_alias` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `created_user_id` (`created_user_id`),
  KEY `reg_schema_property_idx1` (`uri`),
  KEY `schema_id` (`schema_id`),
  KEY `status_id` (`status_id`),
  KEY `subproperty_id` (`is_subproperty_of`),
  KEY `updated_user_id` (`updated_user_id`),
  FOREIGN KEY (`created_user_id`) REFERENCES `reg_user` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  FOREIGN KEY (`updated_user_id`) REFERENCES `reg_user` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  FOREIGN KEY (`schema_id`) REFERENCES `reg_schema` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  FOREIGN KEY (`is_subproperty_of`) REFERENCES `reg_schema_property` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  FOREIGN KEY (`status_id`) REFERENCES `reg_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=15677 DEFAULT CHARSET=latin1;


CREATE TABLE `reg_schema_property_element` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL,
  `created_user_id` int(11) DEFAULT NULL,
  `updated_user_id` int(11) DEFAULT NULL,
  `schema_property_id` int(11) NOT NULL,
  `profile_property_id` int(11) NOT NULL,
  `is_schema_property` tinyint(1) DEFAULT NULL,
  `object` text NOT NULL,
  `related_schema_property_id` int(11) DEFAULT NULL,
  `language` char(6) DEFAULT 'en',
  `status_id` int(11) DEFAULT '1',
  UNIQUE KEY `id` (`id`),
  KEY `created_user_id` (`created_user_id`),
  KEY `updated_user_id` (`updated_user_id`),
  KEY `schema_property_id` (`schema_property_id`),
  KEY `related_property_id` (`related_schema_property_id`),
  KEY `status_id` (`status_id`),
  KEY `profile_property_id` (`profile_property_id`),
  KEY `reg_schema_property_element_idx1` (`object`(1)),
  KEY `reg_schema_property_element_idx2` (`updated_at`),
  FOREIGN KEY (`profile_property_id`) REFERENCES `profile_property` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  FOREIGN KEY (`created_user_id`) REFERENCES `reg_user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  FOREIGN KEY (`updated_user_id`) REFERENCES `reg_user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  FOREIGN KEY (`schema_property_id`) REFERENCES `reg_schema_property` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  FOREIGN KEY (`related_schema_property_id`) REFERENCES `reg_schema_property` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  FOREIGN KEY (`status_id`) REFERENCES `reg_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=122968 DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=1260 COMMENT='InnoDB free: 0 kB; ';


CREATE TABLE `reg_schema_property_element_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_user_id` int(11) DEFAULT NULL,
  `action` enum('updated','added','deleted','force_deleted') DEFAULT NULL,
  `schema_property_element_id` int(11) DEFAULT NULL,
  `schema_property_id` int(11) DEFAULT NULL,
  `schema_id` int(11) DEFAULT NULL,
  `profile_property_id` int(11) DEFAULT NULL,
  `object` text,
  `related_schema_property_id` int(11) DEFAULT NULL,
  `language` char(6) DEFAULT 'en',
  `status_id` int(11) DEFAULT '1',
  `change_note` text,
  `import_id` int(11) DEFAULT NULL,
  UNIQUE KEY `id` (`id`),
  KEY `created_user_id` (`created_user_id`),
  KEY `schema_property_element_id` (`schema_property_element_id`),
  KEY `schema_property_id` (`schema_property_id`),
  KEY `schema_id` (`schema_id`),
  KEY `related_schema_property_id` (`related_schema_property_id`),
  KEY `status_id` (`status_id`),
  KEY `profile_property_id` (`profile_property_id`),
  KEY `reg_schema_property_element_history_idx1` (`created_at`),
  KEY `reg_schema_property_element_history_fk7` (`import_id`),
  FOREIGN KEY (`created_user_id`) REFERENCES `reg_user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  FOREIGN KEY (`schema_property_element_id`) REFERENCES `reg_schema_property_element` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  FOREIGN KEY (`schema_property_id`) REFERENCES `reg_schema_property` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  FOREIGN KEY (`schema_id`) REFERENCES `reg_schema` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  FOREIGN KEY (`related_schema_property_id`) REFERENCES `reg_schema_property` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  FOREIGN KEY (`status_id`) REFERENCES `reg_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  FOREIGN KEY (`profile_property_id`) REFERENCES `profile_property` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  FOREIGN KEY (`import_id`) REFERENCES `reg_file_import_history` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=141929 DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=1170 COMMENT='InnoDB free: 0 kB; ';


CREATE TABLE `schema_has_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `schema_id` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL DEFAULT '0',
  `is_maintainer_for` tinyint(1) DEFAULT '1',
  `is_registrar_for` tinyint(1) DEFAULT '1',
  `is_admin_for` tinyint(1) DEFAULT '1',
  `languages` text,
  `default_language` char(6) NOT NULL DEFAULT 'en',
  `current_language` char(6) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `schema_id` (`schema_id`),
  KEY `user_id` (`user_id`),
  FOREIGN KEY (`schema_id`) REFERENCES `reg_schema` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  FOREIGN KEY (`user_id`) REFERENCES `reg_user` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=99 DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=16384 COMMENT='InnoDB free: 0 kB; ';


CREATE TABLE `schema_has_version` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `created_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_user_id` int(11) DEFAULT NULL,
  `schema_id` int(11) DEFAULT NULL,
  `timeslice` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `created_user_id` (`created_user_id`),
  KEY `schema_id` (`schema_id`),
  FOREIGN KEY (`created_user_id`) REFERENCES `reg_user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  FOREIGN KEY (`schema_id`) REFERENCES `reg_schema` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='InnoDB free: 0 kB; ';




SET @PREVIOUS_FOREIGN_KEY_CHECKS = @@FOREIGN_KEY_CHECKS;
SET FOREIGN_KEY_CHECKS = 0;


LOCK TABLES `reg_agent` WRITE;
ALTER TABLE `reg_agent` DISABLE KEYS;
INSERT INTO `reg_agent` (`id`, `created_at`, `last_updated`, `deleted_at`, `org_email`, `org_name`, `ind_affiliation`, `ind_role`, `address1`, `address2`, `city`, `state`, `postal_code`, `country`, `phone`, `web_address`, `type`) VALUES 
	(1,'2014-05-05 21:27:54','2014-05-05 17:27:54',NULL,'test_owner@example.com','Test Owner','my affiliation',NULL,'my address 1','my address 2','my city','my','my postal code','US','my phone','http://mywebaddress.com','Individual'),
	(2,'2014-05-06 17:51:46','2014-05-06 13:51:46',NULL,'owner@mail.com','owner','',NULL,'','','','','','US','','','Individual'),
	(3,'2014-12-04 04:08:56','2014-12-03 23:08:56',NULL,'jphipps@madcreek.com','vocabs','',NULL,'','','','','','US','','','Individual'),
	(177,'2014-01-13 09:58:44','2014-01-13 10:12:40',NULL,'jscchair@rdatoolkit.org','ALA Publishing','',NULL,'','','','','','US','','','Individual');
ALTER TABLE `reg_agent` ENABLE KEYS;
UNLOCK TABLES;


LOCK TABLES `profile` WRITE;
ALTER TABLE `profile` DISABLE KEYS;
INSERT INTO `profile` (`id`, `agent_id`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`, `child_updated_at`, `child_updated_by`, `name`, `note`, `uri`, `url`, `base_domain`, `token`, `community`, `last_uri_id`, `status_id`, `language`) VALUES 
	(1,58,'2008-04-20 11:52:00','2008-04-20 11:52:00',NULL,36,36,NULL,NULL,NULL,'NSDL Registry Schema',NULL,'http://registry/uri/profile/registryschema',NULL,'http://registry/uri/profile/registryschema','registryschema','100000',100000,1,'en');
ALTER TABLE `profile` ENABLE KEYS;
UNLOCK TABLES;


LOCK TABLES `profile_property` WRITE;
ALTER TABLE `profile_property` DISABLE KEYS;
INSERT INTO `profile_property` (`id`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`, `profile_id`, `name`, `label`, `definition`, `comment`, `type`, `uri`, `status_id`, `language`, `note`, `display_order`, `export_order`, `picklist_order`, `examples`, `is_required`, `is_reciprocal`, `is_singleton`, `is_in_picklist`, `is_in_export`, `inverse_profile_property_id`, `is_in_class_picklist`, `is_in_property_picklist`, `is_in_rdf`, `is_in_xsd`, `is_attribute`, `has_language`, `is_object_prop`, `is_in_form`) VALUES 
	(1,'2008-04-20 12:00:00','2008-04-20 15:00:00',NULL,36,36,NULL,1,'name','name',NULL,NULL,'property','reg:name',1,'en',NULL,1,3,1,NULL,1,0,1,0,1,NULL,0,0,1,1,1,1,0,1),
	(2,'2008-04-20 12:00:00','2008-04-20 15:00:00',NULL,36,36,NULL,1,'label','label',NULL,NULL,'property','rdfs:label',1,'en',NULL,2,4,2,NULL,1,0,0,1,1,NULL,1,1,1,1,0,1,0,1),
	(3,'2008-04-20 12:01:00','2008-04-20 15:01:01',NULL,36,36,NULL,1,'definition','description',NULL,NULL,'property','skos:definition',1,'en',NULL,3,6,3,NULL,0,0,0,1,1,NULL,1,1,1,1,0,1,0,1),
	(4,'2008-04-20 12:02:00','2008-04-20 15:02:00',NULL,36,36,NULL,1,'type','type',NULL,NULL,'property','rdf:type',1,'en',NULL,5,2,5,NULL,1,0,1,0,1,NULL,0,0,1,1,1,0,1,1),
	(5,'2008-04-20 00:02:00','2008-04-20 03:02:02',NULL,36,36,NULL,1,'comment','comment',NULL,NULL,'property','rdfs:comment',1,'en',NULL,4,8,4,NULL,0,0,0,1,1,NULL,1,1,1,1,0,1,0,1),
	(6,'2008-04-20 00:03:00','2008-04-20 15:03:00',NULL,36,36,NULL,1,'isSubpropertyOf','subPropertyOf',NULL,NULL,'property','rdfs:subPropertyOf',1,'en',NULL,6,14,6,NULL,0,0,0,1,1,8,0,1,1,1,0,0,1,1),
	(7,'2008-04-20 00:04:00','2008-04-20 03:04:00',NULL,36,36,NULL,1,'note','note',NULL,NULL,'property','skos:scopeNote',1,'en',NULL,8,7,8,NULL,0,0,0,1,1,NULL,1,1,1,1,0,1,0,1),
	(8,'2008-04-20 12:05:00','2008-04-20 15:05:00',NULL,36,36,NULL,1,'hasSubproperty','hasSubproperty',NULL,NULL,'property','reg:hasSubproperty',1,'en',NULL,7,15,7,NULL,0,0,0,0,0,6,0,0,1,1,1,0,1,0),
	(9,'2009-03-07 11:49:27','2009-03-07 14:49:27',NULL,36,36,NULL,1,'isSubclassOf','subClassOf','','','property','rdfs:subClassOf',1,'en','',9,12,9,'',0,0,0,0,1,10,1,0,1,1,0,0,1,1),
	(10,'2009-03-07 11:53:34','2009-03-07 14:53:34',NULL,36,36,NULL,1,'hasSubClass','hasSubClass',NULL,NULL,'property','reg:hasSubClass',1,'en',NULL,10,13,10,NULL,0,0,0,0,0,9,1,0,1,1,1,0,1,0),
	(11,'2009-03-07 11:57:15','2009-03-07 14:57:15',NULL,36,36,NULL,1,'domain','domain',NULL,NULL,'property','rdfs:domain',1,'en',NULL,11,9,11,NULL,0,0,0,1,1,NULL,0,1,1,1,0,0,1,1),
	(12,'2009-03-07 12:01:38','2009-03-07 15:01:38',NULL,36,36,NULL,1,'orange','range',NULL,NULL,'property','rdfs:range',1,'en',NULL,12,10,12,NULL,0,0,0,1,1,NULL,0,1,1,1,0,0,1,1),
	(13,'2009-03-07 12:01:38','2009-03-07 15:01:38',NULL,36,36,NULL,1,'uri','uri',NULL,NULL,'property','reg:uri',1,'en',NULL,0,1,13,NULL,1,0,1,0,1,NULL,0,0,0,1,1,0,1,1),
	(14,'2009-03-07 12:01:38','2009-03-07 15:01:38',NULL,36,36,NULL,1,'statusId','status',NULL,NULL,'property','reg:status',1,'en',NULL,27,26,27,NULL,1,0,1,0,1,NULL,0,0,0,1,1,0,1,1),
	(15,'2011-09-29 14:12:00','2011-09-29 10:20:25',NULL,36,36,NULL,1,'isInverseOf','inverseOf','','The property that determines that two given properties are inverse.','property','owl:inverseOf',1,'en','',15,16,15,'',0,1,0,1,1,NULL,0,1,1,0,0,0,1,0),
	(16,'2011-09-29 14:23:24','2011-09-29 10:23:24',NULL,36,36,NULL,1,'isSameAs','sameAs','','The property that determines that two given individuals are equal.','property','owl:sameAs',1,'en','',16,17,16,'',0,1,0,1,1,NULL,1,1,1,0,0,0,1,0),
	(17,'2011-09-29 14:26:25','2011-09-29 10:26:25',NULL,36,36,NULL,1,'propertyIsDisjointWith','propertyDisjointWith','','Used to specify that two properties are mutually disjoint, and it is defined as a property itself. ','property','owl:propertyDisjointWith',1,'en','',17,18,17,'',0,1,0,1,1,NULL,0,1,1,1,0,0,1,0),
	(18,'2011-09-29 14:28:57','2011-09-29 10:28:57',NULL,36,36,NULL,1,'isEquivalentClass','equivalentClass','','The property that determines that two given classes are equivalent, and that is used to specify datatype definitions.','property','owl:equivalentClass',1,'en','',19,20,19,'',0,1,0,1,1,NULL,1,0,1,1,0,0,1,0),
	(19,'2011-09-29 14:30:00','2011-09-29 10:30:00',NULL,36,36,NULL,1,'isEquivalentProperty','equivalentProperty','','','property','owl:equivalentProperty',1,'en','',20,21,20,'',0,1,0,1,1,NULL,0,1,1,1,0,0,1,0),
	(20,'2012-02-02 23:21:08','2012-02-02 18:21:08',NULL,36,36,NULL,1,'isDisjointWith','disjointWith','','The property that determines that two given properties are disjoint.','property','owl:disjointWith',1,'en','',18,19,18,'',0,1,0,1,1,NULL,1,1,1,1,0,0,1,0),
	(21,'2012-06-02 23:21:08','2012-06-02 19:21:08',NULL,36,36,NULL,1,'altLabel','altLabel',NULL,NULL,'property','skos:altLabel',1,'en',NULL,21,22,21,NULL,0,0,0,1,1,NULL,1,1,1,1,0,1,0,0),
	(23,'2014-01-18 04:04:02','2014-01-17 23:04:02',NULL,36,36,NULL,1,'narrowMatch','narrowMatch',NULL,NULL,'property','skos:narrowMatch',1,'en',NULL,24,25,24,NULL,0,0,0,1,1,NULL,1,1,1,1,0,0,1,0),
	(24,'2014-01-18 04:04:01','2014-01-17 23:04:01',NULL,36,36,NULL,1,'closeMatch','closeMatch',NULL,NULL,'property','skos:closeMatch',1,'en',NULL,23,24,23,NULL,0,0,0,1,1,NULL,1,1,1,1,0,0,1,0),
	(25,'2014-01-18 04:04:00','2014-01-17 23:04:00',NULL,36,36,NULL,1,'broadMatch','broadMatch',NULL,NULL,'property','skos:broadMatch',1,'en',NULL,22,23,22,NULL,0,0,0,1,1,NULL,1,1,1,1,0,0,1,0),
	(26,'2011-09-29 14:23:24','2011-09-29 10:23:24',NULL,36,36,NULL,1,'hasUnconstrained','hasUnconstrained','','','property','reg:hasUnconstrained',1,'en','',26,11,26,'',0,1,1,1,1,NULL,1,1,1,0,0,0,1,0),
	(27,'2011-09-29 14:23:24','2011-09-29 10:23:24',NULL,36,36,NULL,1,'lexicalAlias','lexicalAlias','','','property','reg:lexicalAlias',1,'en','',25,5,25,'',0,0,0,1,1,NULL,1,1,1,0,0,1,1,1),
	(30,'2015-05-01 23:04:00','2015-05-01 23:04:00',NULL,36,36,NULL,1,'changeNote','change note',NULL,NULL,'property','skos:changeNote',1,'en',NULL,30,30,30,NULL,0,0,0,1,1,NULL,1,1,1,1,0,1,0,0),
	(31,'2014-04-17 23:04:00','2014-04-17 23:04:00',NULL,36,36,NULL,1,'instructionNumber','instruction number','RDA Toolkit instruction number reference','','property','rdakit:instructionNumber',1,'en','',27,27,27,'',0,0,1,1,1,NULL,0,1,1,0,0,0,0,0);
ALTER TABLE `profile_property` ENABLE KEYS;
UNLOCK TABLES;


LOCK TABLES `reg_agent_has_user` WRITE;
ALTER TABLE `reg_agent_has_user` DISABLE KEYS;
INSERT INTO `reg_agent_has_user` (`id`, `created_at`, `updated_at`, `deleted_at`, `user_id`, `agent_id`, `is_registrar_for`, `is_admin_for`) VALUES 
	(1,'2014-12-04 04:08:56','2014-12-04 04:08:56',NULL,2,3,1,1),
	(171,'2014-01-13 09:58:44','2014-01-13 04:58:44',NULL,422,177,1,1);
ALTER TABLE `reg_agent_has_user` ENABLE KEYS;
UNLOCK TABLES;


LOCK TABLES `reg_batch` WRITE;
ALTER TABLE `reg_batch` DISABLE KEYS;
ALTER TABLE `reg_batch` ENABLE KEYS;
UNLOCK TABLES;


LOCK TABLES `reg_file_import_history` WRITE;
ALTER TABLE `reg_file_import_history` DISABLE KEYS;
INSERT INTO `reg_file_import_history` (`id`, `created_at`, `map`, `user_id`, `vocabulary_id`, `schema_id`, `file_name`, `source_file_name`, `file_type`, `batch_id`, `results`, `total_processed_count`, `error_count`, `success_count`) VALUES 
	(41,'2015-04-30 22:00:00',NULL,422,NULL,81,'4eafa66ea44302f211b214cc6c18e9a4.bin','RDA Agent update - rdaa_template-1.csv','text/csv',NULL,NULL,NULL,NULL,NULL),
	(42,'2015-05-03 19:58:49',NULL,422,NULL,81,'3b26624e6572698dcaca5fda134a8949.bin','RDA Agent update - rdaa_template.csv','text/csv',NULL,NULL,NULL,NULL,NULL),
	(43,'2015-05-03 20:13:16',NULL,422,NULL,81,'febbd40dd3ec8309d3dd51120ea80d6c.bin','RDA Agent update - rdaa_template.csv','text/csv',NULL,NULL,NULL,NULL,NULL),
	(44,'2015-05-03 20:19:42',NULL,422,NULL,81,'8906703a37824cc79b0697adefbe810c.bin','RDA Agent update - rdaa_template.csv','text/csv',NULL,NULL,NULL,NULL,NULL),
	(45,'2015-05-03 20:23:04',NULL,422,NULL,81,'7a2773bbba03814842fd6b973f23cbda.bin','RDA Agent update - rdaa_template.csv','text/csv',NULL,NULL,NULL,NULL,NULL),
	(46,'2015-05-03 20:34:00',NULL,422,NULL,81,'2d5bb4602f4c49bdf44268b340613fdb.bin','RDA Agent update - rdaa_template.csv','text/csv',NULL,NULL,NULL,NULL,NULL),
	(47,'2015-05-03 20:37:20',NULL,422,NULL,81,'d9bce9d61557006ff9b913ba924357e6.bin','RDA Agent update - rdaa_template.csv','text/csv',NULL,NULL,NULL,NULL,NULL),
	(48,'2015-05-03 20:42:50',NULL,422,NULL,81,'13cbf1188ac4e45535b6810d5449d6cf.bin','RDA Agent update - rdaa_template.csv','text/csv',NULL,NULL,NULL,NULL,NULL),
	(49,'2015-05-03 21:07:00',NULL,422,NULL,81,'9f58e35bbd12bbd40a52c86e0670c15c.bin','RDA Agent update - rdaa_template.csv','text/csv',NULL,NULL,NULL,NULL,NULL),
	(50,'2015-05-03 21:31:15',NULL,422,NULL,81,'87b5f4195122dad5c50d78f6cd7ac575.bin','RDA Agent update - rdaa_template.csv','text/csv',NULL,NULL,NULL,NULL,NULL),
	(51,'2015-05-03 21:31:44',NULL,422,NULL,81,'b182eec0e3cf489fd826a9f591ff4199.bin','RDA Agent update - rdaa_template.csv','text/csv',NULL,NULL,NULL,NULL,NULL),
	(52,'2015-05-03 21:41:39',NULL,422,NULL,81,'fc22300ab0323ed5ede8a9d923b7cd22.bin','RDA Agent update - rdaa_template.csv','text/csv',NULL,NULL,NULL,NULL,NULL),
	(53,'2015-05-03 21:58:29',NULL,422,NULL,81,'a0d77ceb2f31c7360304e0fb66c6a894.bin','RDA Agent update - rdaa_template.csv','text/csv',NULL,NULL,NULL,NULL,NULL),
	(54,'2015-05-03 21:59:16',NULL,422,NULL,81,'16ca22611f7db105edef3c5ce50722c4.bin','RDA Agent update - rdaa_template.csv','text/csv',NULL,NULL,NULL,NULL,NULL),
	(55,'2015-05-03 22:01:18',NULL,422,NULL,81,'db2e0a7094dbaa39d431fc4215f7849c.bin','RDA Agent update - rdaa_template.csv','text/csv',NULL,NULL,NULL,NULL,NULL),
	(56,'2015-05-03 22:03:31',NULL,422,NULL,81,'482317df1997f493f4b6f1cc35627666.bin','RDA Agent update - rdaa_template.csv','text/csv',NULL,NULL,NULL,NULL,NULL),
	(57,'2015-05-04 20:11:31',NULL,422,NULL,81,'53a8583835715755c3b1293829cb268a.bin','RDA Agent update - rdaa_template.csv','text/csv',NULL,NULL,NULL,NULL,NULL),
	(58,'2015-05-04 20:13:05',NULL,422,NULL,81,'9f60b77e1cac337cc223be821282ac13.bin','RDA Agent update - rdaa_template.csv','text/csv',NULL,NULL,NULL,NULL,NULL),
	(59,'2015-05-04 20:13:26',NULL,422,NULL,81,'d3f338f538c6b489f6e682efbd12e6fd.bin','RDA Agent update - rdaa_template.csv','text/csv',NULL,NULL,NULL,NULL,NULL),
	(60,'2015-05-04 22:47:24',NULL,422,NULL,81,'56f4e460261dd7fbfe9ee89b724e71b9.bin','RDA Agent update - rdaa_template.csv','text/csv',NULL,NULL,NULL,NULL,NULL),
	(61,'2015-05-04 22:47:45',NULL,422,NULL,81,'caa653fb7a2a879209bfe60734aecaa9.bin','RDA Agent update - rdaa_template.csv','text/csv',NULL,NULL,NULL,NULL,NULL),
	(62,'2015-05-04 22:49:12',NULL,422,NULL,81,'b85d1c1df143ae7b6377b7dc511f6c8b.bin','RDA Agent update - rdaa_template.csv','text/csv',NULL,NULL,NULL,NULL,NULL),
	(63,'2015-05-04 22:52:20',NULL,422,NULL,81,'19764d27256ef1d921cdccf56c65d5fd.bin','RDA Agent update - rdaa_template.csv','text/csv',NULL,NULL,NULL,NULL,NULL),
	(64,'2015-05-04 23:04:51',NULL,422,NULL,81,'a5791d6cf0ec12707be2b2ec3db15baf.bin','RDA Agent update - rdaa_template.csv','text/csv',NULL,NULL,NULL,NULL,NULL),
	(65,'2015-05-04 23:42:22',NULL,422,NULL,81,'000d50628a541b211c51dc46cad5ff75.bin','RDA Agent update - rdaa_template.csv','text/csv',NULL,NULL,NULL,NULL,NULL),
	(66,'2015-05-04 23:42:48',NULL,422,NULL,81,'de6fa4bcf9ce986ee5f0a5b9ae489635.bin','RDA Agent update - rdaa_template.csv','text/csv',NULL,NULL,NULL,NULL,NULL),
	(67,'2015-05-04 23:49:00',NULL,422,NULL,81,'11af39587b60a862f1fdb22ebd9fadfc.bin','RDA Agent update - rdaa_template.csv','text/csv',NULL,NULL,NULL,NULL,NULL),
	(68,'2015-05-04 23:52:24',NULL,422,NULL,81,'2a7f6347b138f180da187a03b4d83fcc.bin','RDA Agent update - rdaa_template.csv','text/csv',NULL,NULL,NULL,NULL,NULL),
	(69,'2015-05-05 00:40:05',NULL,422,NULL,81,'fa7e0c1c573cb932df426b0fdc6cff52.bin','RDA Agent update - rdaa_template.csv','text/csv',NULL,NULL,NULL,NULL,NULL),
	(70,'2015-05-05 00:54:26',NULL,422,NULL,81,'42008daf1242b73696639fc348464c34.bin','RDA Agent update - rdaa_template.csv','text/csv',NULL,NULL,NULL,NULL,NULL),
	(71,'2015-05-05 00:59:25',NULL,422,NULL,81,'81a9e499aad3a8662046b7c1d5fd6aac.bin','RDA Agent update - rdaa_template.csv','text/csv',NULL,NULL,NULL,NULL,NULL),
	(72,'2015-05-05 01:16:48',NULL,422,NULL,81,'828dd8721a94265297e2aa8b54e79e95.bin','RDA Agent update - rdaa_template.csv','text/csv',NULL,NULL,NULL,NULL,NULL),
	(73,'2015-05-05 21:20:13',NULL,422,NULL,81,'d13cee9f53dd28d6dafc000ee0fce0ee.bin','RDA Agent update - rdaa_template.csv','text/csv',NULL,NULL,NULL,NULL,NULL),
	(74,'2015-05-05 21:26:28',NULL,422,NULL,81,'daa81aa229b7fc82c57f3f3838b3ba56.bin','RDA Agent update - rdaa_template.csv','text/csv',NULL,NULL,NULL,NULL,NULL),
	(75,'2015-05-05 21:27:39',NULL,422,NULL,81,'29de5f0b0a59786424720f0cf5b27766.bin','RDA Agent update - rdaa_template.csv','text/csv',NULL,NULL,NULL,NULL,NULL),
	(76,'2015-05-05 21:47:57',NULL,422,NULL,81,'8c1d1d24615360d709d89972b152dd3a.bin','RDA Agent update - rdaa_template.csv','text/csv',NULL,NULL,NULL,NULL,NULL),
	(77,'2015-05-05 21:54:06',NULL,422,NULL,81,'fd0de2b55512f484cf79081ebf14a5f7.bin','RDA Agent update - rdaa_template.csv','text/csv',NULL,NULL,NULL,NULL,NULL),
	(78,'2015-05-05 22:21:16',NULL,422,NULL,81,'a60995d68a7eafa38b151fbf93788b61.bin','RDA Agent update - rdaa_template.csv','text/csv',NULL,NULL,NULL,NULL,NULL),
	(79,'2015-05-05 22:39:25',NULL,422,NULL,81,'abc48d6f322ebd39c21d5c2e4793fc2f.bin','RDA Agent update - rdaa_template.csv','text/csv',NULL,NULL,NULL,NULL,NULL),
	(80,'2015-05-06 15:48:30',NULL,422,NULL,81,'cfbd8874c9fd8975e76d62a066e13bfc.bin','RDA Agent update - rdaa_template.csv','text/csv',NULL,NULL,NULL,NULL,NULL);
ALTER TABLE `reg_file_import_history` ENABLE KEYS;
UNLOCK TABLES;


LOCK TABLES `reg_lookup` WRITE;
ALTER TABLE `reg_lookup` DISABLE KEYS;
INSERT INTO `reg_lookup` (`id`, `type_id`, `short_value`, `long_value`, `display_order`) VALUES 
	(1,1,'Published','Published',7),
	(2,1,'New-Proposed','New-Proposed',1),
	(3,1,'Change-Proposed','Change-Proposed',2),
	(4,1,'Deprecate-Proposed','Deprecate-Proposed',3),
	(5,1,'New-Under Review','New-Under Review',4),
	(6,1,'Change-Under Review','Change-Under Review',5),
	(7,1,'Deprecate-Under Revi','Deprecate-Under Review',6),
	(8,1,'Deprecated','Deprecated',8),
	(9,1,'Not Approved','Not Approved',9);
ALTER TABLE `reg_lookup` ENABLE KEYS;
UNLOCK TABLES;


LOCK TABLES `reg_prefix` WRITE;
ALTER TABLE `reg_prefix` DISABLE KEYS;
ALTER TABLE `reg_prefix` ENABLE KEYS;
UNLOCK TABLES;


LOCK TABLES `reg_status` WRITE;
ALTER TABLE `reg_status` DISABLE KEYS;
INSERT INTO `reg_status` (`id`, `display_order`, `display_name`, `uri`) VALUES 
	(1,7,'Published','http://metadataregistry.org/uri/RegStatus/1001'),
	(2,1,'New-Proposed','http://metadataregistry.org/uri/RegStatus/1002'),
	(3,2,'Change-Proposed','http://metadataregistry.org/uri/RegStatus/1003'),
	(4,3,'Deprecate-Proposed','http://metadataregistry.org/uri/RegStatus/1004'),
	(5,4,'New-Under Review','http://metadataregistry.org/uri/RegStatus/1005'),
	(6,5,'Change-Under Review','http://metadataregistry.org/uri/RegStatus/1006'),
	(7,6,'Deprecate-Under Review','http://metadataregistry.org/uri/RegStatus/1007'),
	(8,8,'Deprecated','http://metadataregistry.org/uri/RegStatus/1008'),
	(9,9,'Not Approved','http://metadataregistry.org/uri/RegStatus/1009');
ALTER TABLE `reg_status` ENABLE KEYS;
UNLOCK TABLES;


LOCK TABLES `reg_user` WRITE;
ALTER TABLE `reg_user` DISABLE KEYS;
INSERT INTO `reg_user` (`id`, `created_at`, `last_updated`, `deleted_at`, `nickname`, `salutation`, `first_name`, `last_name`, `email`, `sha1_password`, `salt`, `want_to_be_moderator`, `is_moderator`, `is_administrator`, `deletions`, `password`, `culture`) VALUES 
	(1,'2014-12-04 04:02:52','2014-12-03 23:03:39',NULL,'admin',NULL,NULL,NULL,'jphipps@madcreek.com','89c4c184c5bcf66571433599b3864a92fdde20f2','989dc77e31d1bbace236b7c9da7c92bd',0,0,1,0,NULL,'en_US'),
	(2,'2014-12-04 04:05:45','2014-12-03 23:05:45',NULL,'vocab_owner',NULL,NULL,NULL,'jphipps@madcreek.com','1d3304806406506c724c92ddb07bec42fff1f9de','f9a53f40fe15f0d30d5a1409118259b6',0,0,0,0,NULL,'en_US'),
	(3,'2014-12-04 04:07:03','2014-12-03 23:07:03',NULL,'vocab_maintainer',NULL,NULL,NULL,'jphipps@madcreek.com','1226be1bb7bdce7bab3fad80be1cf652013bb5ef','681f3d73ac442ec27dfe90bf1180de22',0,0,0,0,NULL,'en_US'),
	(36,'2006-03-24 17:29:24','2015-04-19 14:01:02',NULL,'jonphipps',NULL,'Jon','Phipps','jphipps@madcreek.com','b3b7198a3d4c723144515f42e78791ce78234e11','98cc89713b2453d5b4e2ff33760600ab',0,0,1,0,NULL,'en_US'),
	(422,'2014-01-13 09:53:37','2015-04-19 14:35:52',NULL,'JSCChair',NULL,'JSC','Chair','jscchair@rdatoolkit.org','b3b7198a3d4c723144515f42e78791ce78234e11','98cc89713b2453d5b4e2ff33760600ab',0,0,0,0,NULL,'en_US');
ALTER TABLE `reg_user` ENABLE KEYS;
UNLOCK TABLES;


LOCK TABLES `reg_schema` WRITE;
ALTER TABLE `reg_schema` DISABLE KEYS;
INSERT INTO `reg_schema` (`id`, `agent_id`, `created_at`, `updated_at`, `deleted_at`, `created_user_id`, `updated_user_id`, `child_updated_at`, `child_updated_user_id`, `name`, `note`, `uri`, `url`, `base_domain`, `token`, `community`, `last_uri_id`, `status_id`, `language`, `profile_id`, `ns_type`, `prefixes`, `languages`, `repo`) VALUES 
	(81,177,'2014-01-13 10:14:49','2015-05-05 01:17:31',NULL,422,422,NULL,NULL,'RDA Agent properties','Properties derived from RDA elements and relationship designators with the domain of RDA Agent.','http://rdaregistry.info/Elements/a/','','http://metadataregistry.org/uri/schema/','rdaa','',100000,1,'en',1,'slash','a:16:{s:4:"rdac";s:35:"http://rdaregistry.info/Elements/c/";s:4:"rdaa";s:35:"http://rdaregistry.info/Elements/a/";s:4:"rdau";s:35:"http://rdaregistry.info/Elements/u/";s:4:"rdaw";s:35:"http://rdaregistry.info/Elements/w/";s:4:"rdai";s:35:"http://rdaregistry.info/Elements/i/";s:4:"rdae";s:35:"http://rdaregistry.info/Elements/e/";s:4:"rdam";s:35:"http://rdaregistry.info/Elements/m/";s:3:"owl";s:30:"http://www.w3.org/2002/07/owl#";s:4:"rdaz";s:35:"http://rdaregistry.info/Elements/z/";s:4:"rdfs";s:37:"http://www.w3.org/2000/01/rdf-schema#";s:3:"reg";s:46:"http://metadataregistry.org/uri/profile/RegAp/";s:4:"skos";s:36:"http://www.w3.org/2004/02/skos/core#";s:3:"mrc";s:38:"http://id.loc.gov/vocabulary/relators/";s:6:"rdakit";s:41:"http://rdaregistry.info/Elements/toolkit/";s:7:"regstat";s:42:"http://metadataregistry.org/uri/RegStatus/";s:0:"";N;}','a:3:{i:0;s:2:"en";i:1;s:2:"fr";i:2;s:2:"es";}','');
ALTER TABLE `reg_schema` ENABLE KEYS;
UNLOCK TABLES;


LOCK TABLES `reg_rdf_namespace` WRITE;
ALTER TABLE `reg_rdf_namespace` DISABLE KEYS;
ALTER TABLE `reg_rdf_namespace` ENABLE KEYS;
UNLOCK TABLES;


LOCK TABLES `reg_schema_property` WRITE;
ALTER TABLE `reg_schema_property` DISABLE KEYS;
INSERT INTO `reg_schema_property` (`id`, `created_at`, `updated_at`, `deleted_at`, `created_user_id`, `updated_user_id`, `schema_id`, `name`, `label`, `definition`, `comment`, `type`, `is_subproperty_of`, `parent_uri`, `uri`, `status_id`, `language`, `note`, `domain`, `orange`, `is_deprecated`, `url`, `lexical_alias`) VALUES 
	(15536,'2014-01-19 11:29:58','2014-01-19 06:29:58',NULL,422,422,81,'respondentOf','is respondent of','Relates a candidate for a degree who defends or opposes a thesis provided by the praeses in an academic disputation to the work.','','property',NULL,'http://rdaregistry.info/Elements/a/P50204','http://rdaregistry.info/Elements/a/P50001',1,'en','','http://rdaregistry.info/Elements/c/C10004','http://rdaregistry.info/Elements/c/C10001',NULL,NULL,NULL);
ALTER TABLE `reg_schema_property` ENABLE KEYS;
UNLOCK TABLES;


LOCK TABLES `reg_schema_property_element` WRITE;
ALTER TABLE `reg_schema_property_element` DISABLE KEYS;
INSERT INTO `reg_schema_property_element` (`id`, `created_at`, `updated_at`, `deleted_at`, `created_user_id`, `updated_user_id`, `schema_property_id`, `profile_property_id`, `is_schema_property`, `object`, `related_schema_property_id`, `language`, `status_id`) VALUES 
	(121276,'2014-01-19 11:29:58','2014-01-19 06:29:58',NULL,422,422,15536,1,1,'respondentOf',NULL,'en',1),
	(121277,'2014-01-19 11:29:58','2014-01-19 06:29:58',NULL,422,422,15536,2,1,'is respondent of',NULL,'en',1),
	(121278,'2014-01-19 11:29:58','2014-01-19 06:29:58',NULL,422,422,15536,3,1,'Relates a candidate for a degree who defends or opposes a thesis provided by the praeses in an academic disputation to the work.',NULL,'en',1),
	(121279,'2014-01-19 11:29:58','2014-01-19 06:29:58',NULL,422,422,15536,4,1,'subproperty',NULL,'en',1),
	(121280,'2014-01-19 11:29:58','2014-01-19 06:29:58',NULL,422,422,15536,11,1,'http://rdaregistry.info/Elements/c/C10004',NULL,'en',1),
	(121281,'2014-01-19 11:29:58','2014-01-19 06:29:58',NULL,422,422,15536,12,1,'http://rdaregistry.info/Elements/c/C10001',NULL,'en',1),
	(121282,'2014-01-19 11:29:58','2014-01-19 06:29:58',NULL,422,422,15536,13,1,'http://rdaregistry.info/Elements/a/P50001',NULL,'en',1),
	(121283,'2014-01-19 11:29:58','2014-01-19 06:29:58',NULL,422,422,15536,14,1,'1',NULL,'en',1),
	(121284,'2014-01-19 11:29:58','2014-01-19 06:29:58',NULL,422,422,15536,6,1,'http://rdaregistry.info/Elements/a/P50204',14069,'en',1),
	(121285,'2014-01-19 11:31:45','2014-01-19 06:31:45',NULL,422,422,15536,6,NULL,'http://rdaregistry.info/Elements/u/P60001',14603,'en',1),
	(121286,'2014-01-19 11:33:14','2014-01-19 06:33:14',NULL,422,422,15536,15,NULL,'http://rdaregistry.info/Elements/w/P10001',NULL,'en',1),
	(122794,'2014-04-26 06:27:36','2014-04-26 02:27:36',NULL,422,422,15536,16,NULL,'http://rdaregistry.info/Elements/a/respondentOf',NULL,'en',1);
ALTER TABLE `reg_schema_property_element` ENABLE KEYS;
UNLOCK TABLES;


LOCK TABLES `reg_schema_property_element_history` WRITE;
ALTER TABLE `reg_schema_property_element_history` DISABLE KEYS;
INSERT INTO `reg_schema_property_element_history` (`id`, `created_at`, `created_user_id`, `action`, `schema_property_element_id`, `schema_property_id`, `schema_id`, `profile_property_id`, `object`, `related_schema_property_id`, `language`, `status_id`, `change_note`, `import_id`) VALUES 
	(139292,'2014-01-19 06:29:58',422,'added',121276,15536,81,1,'respondentOf',NULL,'en',1,NULL,NULL),
	(139293,'2014-01-19 06:29:58',422,'added',121277,15536,81,2,'is respondent of',NULL,'en',1,NULL,NULL),
	(139294,'2014-01-19 06:29:58',422,'added',121278,15536,81,3,'Relates a candidate for a degree who defends or opposes a thesis provided by the praeses in an academic disputation to the work.',NULL,'en',1,NULL,NULL),
	(139295,'2014-01-19 06:29:58',422,'added',121279,15536,81,4,'subproperty',NULL,'en',1,NULL,NULL),
	(139296,'2014-01-19 06:29:58',422,'added',121280,15536,81,11,'http://rdaregistry.info/Elements/c/C10004',NULL,'en',1,NULL,NULL),
	(139297,'2014-01-19 06:29:58',422,'added',121281,15536,81,12,'http://rdaregistry.info/Elements/c/C10001',NULL,'en',1,NULL,NULL),
	(139298,'2014-01-19 06:29:58',422,'added',121282,15536,81,13,'http://rdaregistry.info/Elements/a/P50001',NULL,'en',1,NULL,NULL),
	(139299,'2014-01-19 06:29:58',422,'added',121283,15536,81,14,'1',NULL,'en',1,NULL,NULL),
	(139300,'2014-01-19 06:29:58',422,'added',121284,15536,81,6,'http://rdaregistry.info/Elements/a/P50204',NULL,'en',1,NULL,NULL),
	(139301,'2014-01-19 06:31:45',422,'added',121285,15536,81,6,'http://rdaregistry.info/Elements/u/P60001',NULL,'en',1,NULL,NULL),
	(139302,'2014-01-19 06:33:14',422,'added',121286,15536,81,15,'http://rdaregistry.info/Elements/w/P10001',NULL,'en',1,NULL,NULL),
	(141444,'2014-04-26 02:27:36',422,'added',122794,15536,81,16,'http://rdaregistry.info/Elements/a/respondentOf',NULL,'en',1,NULL,NULL);
ALTER TABLE `reg_schema_property_element_history` ENABLE KEYS;
UNLOCK TABLES;


LOCK TABLES `schema_has_user` WRITE;
ALTER TABLE `schema_has_user` DISABLE KEYS;
INSERT INTO `schema_has_user` (`id`, `created_at`, `updated_at`, `deleted_at`, `schema_id`, `user_id`, `is_maintainer_for`, `is_registrar_for`, `is_admin_for`, `languages`, `default_language`, `current_language`) VALUES 
	(95,'2014-01-13 10:14:49','2014-01-13 10:14:49',NULL,81,422,1,1,1,NULL,'en',NULL);
ALTER TABLE `schema_has_user` ENABLE KEYS;
UNLOCK TABLES;


LOCK TABLES `schema_has_version` WRITE;
ALTER TABLE `schema_has_version` DISABLE KEYS;
ALTER TABLE `schema_has_version` ENABLE KEYS;
UNLOCK TABLES;




SET FOREIGN_KEY_CHECKS = @PREVIOUS_FOREIGN_KEY_CHECKS;


