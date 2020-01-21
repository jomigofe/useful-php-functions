<?

/**
	 * Creates an array with the built 'sql' query, the 'vars' to the query and a 'debug' version of the query
	 *
	 * @param string  $table    The table where the date will be inserted
	 * @param array   $fieldss  Array of fields ex:
	 *                  array(
	 *                    'qtd' => array(
	 *                      'required'=>true,
	 *                      'type'=>'float'
	 *                    ),
	 *                    'discount' => array(
	 *                      'required'=>false,
	 *                      'type'=>'float'
	 *                    ),
	 *                    'total_price' => array(
	 *                      'required'=>true,
	 *                      'type'=>'float'
	 *                    ),
	 *                    'id_tax' => array(
	 *                      'required'=>true,
	 *                      'type'=>'int'
	 *                    )
	 *                  )
	 * @param array   $data     Array of data ex:
	 *                  array(
	 *                    'qtd' => 12.5,
	 *                    'discount' => 13.33,
	 *                    'total_price' => 12.5,
	 *                    'id_tax' => 2
	 *                  )
	 * 
	 * @author José Ferreira <jose@someofmy.work>
	 * @return Array('sql'=>...,'debug'=>...,'vars'=>...)
	 */ 
	function buildInsertValues($table, $fieldss, $data) {
		$fields = $values = $vars = $debug = array();
		foreach ($fieldss as $k => $v) {

			if(isset($data[$k])) {
				$fields[] = "`".$k."`";
				$values[] = ':'.$k;
				$v['type'] = isset($v['type'])?$v['type']:'text';
				$vars[':'.$k] = sanitizeRequireField($v['type'],$data[$k]);
				if($v['type']=='text') {
					$debug[] = "'".addslashes(sanitizeRequireField($v['type'],$data[$k]))."'";
				} else {
					$debug[] = addslashes(sanitizeRequireField($v['type'],$data[$k]));
				}
			}
		}

		return array(
			'sql' 	=> "INSERT INTO `".$table."` (".implode(",", $fields).") VALUES (".implode(",", $values).");",
			'debug' => "INSERT INTO `".$table."` (".implode(",", $fields).") VALUES (".implode(",", $debug).");",
			'vars' 	=> $vars
		);
	}

	function sanitizeRequireField($type, $value) {
		if ($type=='float') {
			return sanitizeFloat($value);
		} elseif ($type=='int') {
			return filter_var($value,FILTER_SANITIZE_NUMBER_INT);
		} else {
			return $value;
		}
	}

	function sanitizeFloat($num) {
		return filter_var($num,FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION);
	}

?>