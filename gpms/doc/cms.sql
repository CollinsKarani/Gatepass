#$
DELETE FROM `gpms_admin` ;#$
INSERT INTO `gpms_admin` VALUES('reg_key', '12-580-323');#$
DELETE FROM `gpms_cat` ;#$
INSERT INTO `gpms_cat` VALUES('6', 'Laptop', '1442349747_HCdMv573212');#$
INSERT INTO `gpms_cat` VALUES('2', 'Desktop', '1442349747_HCdMv573212');#$
INSERT INTO `gpms_cat` VALUES('4', 'ALL in One', '1442349747_HCdMv573212');#$
INSERT INTO `gpms_cat` VALUES('7', 'HP Pavillion', 'oneApple_1');#$
DELETE FROM `gpms_company` ;#$
INSERT INTO `gpms_company` VALUES('1', 'oneApple_1', 'GPMS', '', 'Hello', 'Karachi', '', '', '', '', '', 'Sindh', 'Pakistan', '');#$
DELETE FROM `gpms_depart` ;#$
INSERT INTO `gpms_depart` VALUES('13', 'new', '0');#$
INSERT INTO `gpms_depart` VALUES('10', 'Weaving', '0');#$
INSERT INTO `gpms_depart` VALUES('8', 'Admin', '0');#$
INSERT INTO `gpms_depart` VALUES('9', 'Dispatch', '0');#$
INSERT INTO `gpms_depart` VALUES('14', 'IT', '0');#$
INSERT INTO `gpms_depart` VALUES('15', 'Admin', '1442349747_HCdMv573212');#$
INSERT INTO `gpms_depart` VALUES('17', 'Admin', 'oneApple_1');#$
DELETE FROM `gpms_gp_no` ;#$
INSERT INTO `gpms_gp_no` VALUES('1', 'GP18/2015/09-0001', '1442349747');#$
INSERT INTO `gpms_gp_no` VALUES('2', 'GP18/2015/09-0002', '1442349747');#$
INSERT INTO `gpms_gp_no` VALUES('3', 'GP18/2015/10-0003', '1442349747');#$
INSERT INTO `gpms_gp_no` VALUES('4', 'GP18/2015/10-0004', '1442349747');#$
INSERT INTO `gpms_gp_no` VALUES('5', 'GP18/2015/10-0001', '0');#$
DELETE FROM `gpms_members` ;#$
INSERT INTO `gpms_members` VALUES('21', 'Ayaz', 'Haider', 'ayaz1', 'ayaz123', '2', 'user', 'oneApple_1', 'varified');#$
INSERT INTO `gpms_members` VALUES('22', 'Abdul', 'Ghaffar', 'ghaffar', '123', '2', 'user', 'oneApple_1', 'varified');#$
INSERT INTO `gpms_members` VALUES('19', 'User', 'User', 'user', 'user', '2', 'user', 'oneApple_1', 'varified');#$
INSERT INTO `gpms_members` VALUES('18', 'Aamir', 'Khan', 'admin', 'admin', '1', 'admin', 'oneApple_1', 'varified');#$
DELETE FROM `gpms_ow_non_main` ;#$
INSERT INTO `gpms_ow_non_main` VALUES('1', 'admin', 'NOT RET', '2015-09-15', '20:19:00', 'ADMIN', 'GP18/2015/09-0001', '', 'GM', '2015-09-16 02:19:52', 'admin', '', '', '', '1', '');#$
INSERT INTO `gpms_ow_non_main` VALUES('2', 'admin', 'T', '2015-10-03', '12:04:00', 'ADMIN', 'GP18/2015/10-0003', '', 'AYAZ', '2015-10-03 18:05:13', '1442349747_HCdMv573212', '', 'P01', '', '0', 'admin');#$
INSERT INTO `gpms_ow_non_main` VALUES('3', 'admin', 'T', '2015-10-03', '12:23:00', 'ADMIN', 'GP18/2015/10-0004', '', 'GM', '2015-10-03 18:24:09', '1442349747_HCdMv573212', '', '', '', '0', 'admin');#$
INSERT INTO `gpms_ow_non_main` VALUES('4', 'ONE APPLE', '1', '2015-10-03', '14:30:00', 'ADMIN', 'GP18/2015/10-0001', 'ALI', 'GM', '2015-10-03 19:30:55', 'oneApple_1', '', '', '', '1', 'Aamir');#$
DELETE FROM `gpms_ow_non_sub` ;#$
INSERT INTO `gpms_ow_non_sub` VALUES('1', 'GP18/2015/09-0001', 'THIS IS Test', 'KG', '1', '', '', '', '');#$
INSERT INTO `gpms_ow_non_sub` VALUES('2', 'GP18/2015/10-0003', 'THIS IS', 'KG', '1', 'DELL INSPIRON', 'RE', '', '');#$
INSERT INTO `gpms_ow_non_sub` VALUES('3', 'GP18/2015/10-0004', 'THIS IS TEST', 'KG', '1', '', '', '', '');#$
INSERT INTO `gpms_ow_non_sub` VALUES('4', 'GP18/2015/10-0001', 'THIS IS TEST', '', '1', '', '', '', '');#$
DELETE FROM `gpms_ow_ret_main` ;#$
INSERT INTO `gpms_ow_ret_main` VALUES('1', 'admin', '111', '2015-09-15', '20:46:00', 'ADMIN', 'GP18/2015/09-0002', '', 'GM', '2015-09-15', '2015-09-16 02:46:36', 'admin', '', '', '1', '');#$
DELETE FROM `gpms_ow_ret_sub` ;#$
INSERT INTO `gpms_ow_ret_sub` VALUES('1', 'GP18/2015/09-0002', 'WW', 'KG', '12', '', '', '', 'Returned');#$
INSERT INTO `gpms_ow_ret_sub` VALUES('2', 'GP18/2015/09-0002', 'SA', 'KG', '12', '', '', '', 'Pending');#$
DELETE FROM `gpms_user_company` ;#$
INSERT INTO `gpms_user_company` VALUES('2', '1407139299_BnJYP624436', 'LiveBMS', '', '', '', '', '', '0343-3091454', '', 'livebms.com', 'Sindh', 'Pakistan', '');#$
INSERT INTO `gpms_user_company` VALUES('3', '1407139442_QIkuK327887', 'LiveBMS', '', '', '', '', '', '0343-3091454', '', 'livebms.com', 'Sindh', 'Pakistan', '');#$
INSERT INTO `gpms_user_company` VALUES('4', 'oneApple_1', 'khan co', '', 'ggg', 'ggg', 'gg', '', '0999999', '', 'ggg', 'ggg', 'ggg', '');