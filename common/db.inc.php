<?php
	// ============================================================================================
	// FUNCTION : doQuery($theQuery string, $dbSchema string)
	//          : $theQuery	 - A SQL query
	//          : $dbSchema  - The database to run the query against
	// ............................................................................................
	// returns  : data array
	// --------------------------------------------------------------------------------------------
        function doQuery($theQuery, $dbSchema){
		$test = chooseDBUser($dbSchema);
		$uid  = $test[0];
		$pw   = $test[1];
                /* ******* production connect
		$connect = array('multimedia.pavestone.com', $uid, $pw, $dbSchema);
		****/
                // connect in test
		$connect = array($_SESSION['db'], $uid, $pw, $dbSchema);

                $db1 = mysql_pconnect($connect[0], $connect[1], $connect[2])
                        or die('The database is currently unavailable...please try again laters');

                if (!$db1) {
                        $list = 'Service is not currently available...please try again later';
                        $objResponse->addAssign("outputDiv","innerHTML",$list);
                        return $objResponse;
                        exit;
                } else {
                        mysql_selectdb($connect[3]);
                        $mReturn = mysql_query($theQuery, $db1);
            			if (mysql_errno($db1) != 0) { 
            				echo mysql_errno($db1) . ": " . mysql_error($db1). "\n";
            			}
                }
                return ($mReturn);
        }



    // ============================================================================================
    // FUNCTION : doODBCQuery($theQuery string)
    //          : $theQuery	 - A SQL query
    // ............................................................................................
    // returns  : data array
    // --------------------------------------------------------------------------------------------
        function doODBCQuery($theQuery, $dbSchema) {
            $test = chooseDBUser($dbSchema);
            $uid  = $test[0];
            $pw   = $test[1];
            $odbc   = $test[2];
            $conn = odbc_connect($odbc,$uid,$pw);

            if( $conn === false )
            {
                 echo "Unable to connect.</br>";
                 die( print_r( odbc_error(), true));
            }

            $mReturn = odbc_exec( $conn, $theQuery);

            if( $stmt === false )
            {
                 echo "Error in executing query.</br>";
                 die( print_r( odbc_error(), true));
            }

            return ($mReturn);

        }



	// ============================================================================================
	// FUNCTION : chooseDBUser($dbSchema string)
	//          : $dbSchema  - The name of an active database
	// ............................................................................................
	// returns  : data array
	// --------------------------------------------------------------------------------------------
        function chooseDBUser($dbSchema) {
            switch ($dbSchema) {
                case "locator":
                    $uid = "paveuser";
                    $pw  = "stone1!";
                    break;
        		case "pavestone":
        			$uid = "root";
        			$pw  = "p4v3st0n3";
        			break;
        		case "homedepot":
        			$uid = "root";
        			$pw  = "p4v3st0n3";
        			break;
                case "retailcalllog":
                    $uid = "root";
                    $pw  = "p4v3st0n3";
                    break;
                case "retailutil":
                    $uid = "root";
                    $pw  = "p4v3st0n3";
                    break;
                case "trafficlanes":
                    $uid = "TrafficLanes";
                    $pw  = "b3dr0ck";
                    $odbc = "TrafficLanes-SQL01";
                    break;
		case "search":
                    $_SESSION['db'] = "db394.perfora.net";
                    $uid = "dbo163704278:";
                    $pw  = "pavetheworldinstone";
                    break;
      		default:
			$uid = "root";
       			$pw  = "p4v3st0n3";
       			break;
            }
		$dbReturn = array ($uid, $pw, $odbc);
		return ($dbReturn);
        }


        // Build the Drop Downs
        // ============================================================================================
        // function buildOptions($whichOption)
        // ............................................................................................
        // returns : <option value="xxx">thisState</option> ----- > HTML for state dropdowns (selects)
        // --------------------------------------------------------------------------------------------
        /*function buildOptions($whichOption) {
            switch ($whichOption) {
                case 'BYO':
                    $thisTbl    = 'byo';
                    $thisOrder = 'byo';
                    break;
                case 'DM':
                    $thisTbl    = 'dm';
                    $thisOrder = '';
                    break;
                case 'CUSTSKU':
                    $thisTbl    = 'cust_sku';
                    $thisOrder = '';
                    break;
                case 'MKTNO':
                    $thisTbl    = 'mkt_no';
                    $thisOrder = '';
                    break;
                case 'REP':
                    $thisTbl    = 'rep';
                    $thisOrder = '';
                    break;
                default:
                    return ('nothing');
            }

            $thisReturn = '';
            $query      = 'SELECT * FROM '.$thisTbl;//.'  ORDER BY '.$thisOrder;
            $results    = doQuery($query, "homedepot");

            while ($thisLine = mysql_fetch_array($results))
            {
            $thisReturn .= '<option value="'.$thisLine[0].'"';

            if ($thisLine[0] == $whichChecked)
            $thisReturn .= ' selected';

            $thisReturn .=  '>'.$thisLine[0].'</option>';
            }
            return ($thisReturn);
        }*/

	// ============================================================================================
	// FUNCTION : fill_js_table_content_from_mysql($result_obj)
	//          : $result_obj  - 
	// ............................................................................................
	// returns  : 
	// --------------------------------------------------------------------------------------------
	function fill_js_table_content_from_mysql($result_obj)
	{
		echo '<script type="text/javascript">var TABLE_CONTENT = [';
			$i = 1;
			while($row = mysql_fetch_array($result_obj)) {
				$j = 0;
				echo '[';
				while($j < mysql_num_fields($result_obj)) {
					if(is_numeric($row[$j])) {
						echo isnull(htmlspecialchars($row[$j]));
					} else {
						echo '"' . isnull(htmlspecialchars($row[$j])) . '"';
					}
					if(($j + 1) == mysql_num_fields($result_obj)) {
						break; 
					}
					echo ',';
					$j++;
				}
				if($i == mysql_num_rows($result_obj)) {
					echo ']'; 
				} else {
					echo '],'; 
				}
				$i++;
			}
		echo '];</script>';
	}

	function isnull($input) {
		if(empty($input)) {
			return ('');
		} else {
			return ($input);
		}
	}
	
	function mysql_enum_values($tableName,$fieldName){
		$result = mysql_query("DESCRIBE $tableName");
		
		//then loop:
		while($row = mysql_fetch_array($result)){
			//# row is mysql type, in format "int(11) unsigned zerofill"
			//# or "enum('cheese','salmon')" etc.
			
			ereg('^([^ (]+)(\((.+)\))?([ ](.+))?$',$row['Type'],$fieldTypeSplit);
			//# split type up into array
			$ret_fieldName = $row['Field'];
			$fieldType = $fieldTypeSplit[1];// eg 'int' for integer.
			$fieldFlags = $fieldTypeSplit[5]; // eg 'binary' or 'unsigned zerofill'.
			$fieldLen = $fieldTypeSplit[3]; // eg 11, or 'cheese','salmon' for enum.
			
			if (($fieldType=='enum' || $fieldType=='set') && ($ret_fieldName==$fieldName) ){
				$fieldOptions = split("','",substr($fieldLen,1,-1));
				return $fieldOptions;
			}
		}
		//if the funciton makes it this far, then it either 
		//did not find an enum/set field type, or it 
		//failed to find the the fieldname, so exit FALSE!
		return FALSE;
	}

	// ============================================================================================
	// FUNCTION : JobLogging ($thisEvt, $progStat)
	// ............................................................................................
	// returns  : ($thisHandle, $thisEvt."\r\n")
	// --------------------------------------------------------------------------------------------
	function JobLogging($thisEvt, $progStat) {
		global $thisHandle;
		
		if ($progStat == 'F') {
			fwrite ($thisHandle, $thisEvt."\r\n");
			fwrite ($thisHandle, "------------------------------------------\r\n");
			fwrite ($thisHandle, " ERROR *** END LOG \r\n");
			fwrite ($thisHandle, "------------------------------------------\r\n");
			fclose ($thisHandle);
		} elseif ($progStat == 'Close')	{
			$thisRun    = date ("l dS of F Y h:i:s A"); 
			
			fwrite ($thisHandle, $thisEvt."\r\n");
			fwrite ($thisHandle, "------------------------------------------\r\n");
			fwrite ($thisHandle, " END LOG FOR RUN: $thisRun\r\n");
			fwrite ($thisHandle, "------------------------------------------\r\n");
			fclose ($thisHandle);
		} elseif ($progStat == 'Start') {
			$thisHandle = fopen ($thisEvt.date("Ymd").'.log', 'a');
			$thisRun    = date ("l dS of F Y h:i:s A");
			fwrite ($thisHandle, "\r\n");
			fwrite ($thisHandle, "==========================================\r\n");
			fwrite ($thisHandle, "BEGIN LOG FOR RUN: $thisRun\r\n"); 
			fwrite ($thisHandle, "==========================================\r\n");
			fwrite ($thisHandle, "\r\n");
		} else {
			fwrite ($thisHandle, $thisEvt."\r\n");
		}
	}

?>
