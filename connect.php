<?php
                        // Database connection string
                        $jktsatu = "
                        (DESCRIPTION =
                            (ADDRESS_LIST =
                            (ADDRESS = 
                                (PROTOCOL = TCP)
                                (HOST = localhost)
                                (PORT = 1521)
                            )
                            )
                            (CONNECT_DATA = (SERVICE_NAME = jakasatu)
                        ))";

                        // Connect to the database
                        $db = oci_connect(username, password, database);

                        if (!$db) {
                            $e = oci_error();
                            die("Connection failed: " . htmlspecialchars($e['message'], ENT_QUOTES, 'UTF-8'));
                        }
