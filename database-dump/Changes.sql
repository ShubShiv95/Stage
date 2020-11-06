ALTER TABLE `employee_master_table` CHANGE `sms_number` `SMS_Contact_No` VARCHAR(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL;
ALTER TABLE `employee_master_table` CHANGE `whatsapp_number` `Whatsapp_Contact_No` VARCHAR(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL;

ALTER TABLE `close_user_group_details` CHANGE `mobile_no` `SMS_Contact_No` VARCHAR(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL;
ALTER TABLE `close_user_group_details` ADD `Whatsapp_Contact_No` VARCHAR(12) NOT NULL AFTER `SMS_Contact_No`;
ALTER TABLE `close_user_group_details` ADD `Enabled` BOOLEAN NOT NULL DEFAULT FALSE AFTER `user_id`, ADD `School_Id` INT NOT NULL AFTER `Enabled`, ADD `Updated_by` VARCHAR(100) NOT NULL AFTER `School_Id`, ADD `Updated_On` TIMESTAMP NOT NULL AFTER `Updated_by`;
