<?PHP
    require_once 'XML/Serializer.php';

    // this is just to get a nested object
    $pearError = PEAR::raiseError('This is just an error object',123);
    
    $options = array(
                        "indent"         => "    ",
                        "linebreak"      => "\n",
                        "defaultTagName" => "unnamedItem",
                        "typeHints"      => true
                    );
    
    $foo    =   new stdClass;
    
    $foo->value = "My value";
    $foo->error = $pearError;
    $foo->xml   = "cool";
    
    $serializer = new XML_Serializer($options);
    
    $result = $serializer->serialize($foo);
    
    if( $result === true ) {
		$xml = $serializer->getSerializedData();
    }

    echo	"<pre>";
    print_r( htmlspecialchars($xml) );
    echo	"</pre>";
?>