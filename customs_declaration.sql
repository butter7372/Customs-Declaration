CREATE TABLE `declaration`  (
  `SAP_order` varchar(10) NOT NULL,
  `SAP_order_attachment` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `declaration_number` varchar(10) DEFAULT NULL,
  `declaration_attachment` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `invoice_number` varchar(10) DEFAULT NULL,
  `invoice_attachment` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `package_number` varchar(10) DEFAULT NULL,
  `package_number_attachment` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `shipment_number` varchar(10) DEFAULT NULL,
  `shipment_number_attachment` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `shipment_order` varchar(10) DEFAULT NULL,
  `shipment_order_attachment` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `IncoTerm` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `declarant` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `shipment_fee` decimal(20, 2) DEFAULT NULL,
  `insurance_fee` decimal(20, 2) DEFAULT NULL,
  `other_fee` decimal(20, 2) DEFAULT NULL,
  PRIMARY KEY (`SAP_order`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

SET FOREIGN_KEY_CHECKS = 1;
