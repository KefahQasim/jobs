<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	
 class gebaya_conn{

    /*
     
    private $ip   = '10.60.60.205' ;
    public $user = 'kefah' ;
    private $pass = 'oracle' ;
    private $instance = 'orcl' ;
    private $encode =  'AL32UTF8'; 
    
    */
    
    
    private $ip   = 'localhost' ;
    public $user = 'kefah' ;
    private $pass = 'oracle' ;
    private $instance = 'GIS' ;
    private $encode =  'AL32UTF8';
    
    
    private $CI;
    private $conn = '';
    private $output = array();
    private $lob = array();
    private $cur_ref = array('cur','cr','cursor','refcursor') ;
    
  
   public function __construct(){
        $this->conn = oci_pconnect( $this->user , $this->pass ,$this->ip.'/'.$this->instance , $this->encode ) or die ('حدث مشكلة أثناء عملية الإتصال - تأكد من صحة البيانات');
        
        $this->CI =& get_instance();
        
    }
     public function reconn(){
        $this->conn = oci_pconnect( $this->user , $this->pass ,$this->ip.'/'.$this->instance , $this->encode ) or die ('حدث مشكلة أثناء عملية الإتصال - تأكد من صحة البيانات');
     }
   public function set_connection_parms($ip,$user,$pass,$instance,$encode){
        $this->ip = $ip;
        $this->user = $user;
        $this->pass = $pass;
        $this->instance = $instance;
        $this->encode = $encode;

        $this->conn = oci_connect( $this->user , $this->pass ,$this->ip.'/'.$this->instance , $this->encode ) or die ('حدث مشكلة أثناء عملية الإتصال - تأكد من صحة البيانات');
    }



   public function excuteProcedures($package,$procedure,$params){
        $sql = "begin $package.$procedure(";
       // foreach ($params as $param)
        //{
        for($j = 0; $j < count($params); $j++)
        {
            $param = $params[$j];
            $sql .= $param['name'] . ",";
        }
        $sql = trim($sql, ",") . "); end;";
        if ($this->conn==NULL){
            $this->reconn();
        }
        //echo($sql);
        $stmt = oci_parse($this->conn,$sql);
        $refcur = $this->bind_params($stmt,$params);
        $exc = @oci_execute($stmt, OCI_DEFAULT);
     if(!$exc)
            $this->error_handeling($exc,$stmt);
        if(count($refcur) > 0){
            $this->excuteCursor($params,$refcur);
        }

        if(count($this->lob) > 0){
            $this->excuteBLOB($params,$this->lob);
        }
        oci_commit($this->conn);
        oci_close($this->conn);
        
	//	oci_close($this->conn);
        return $this->output;
    }



  public  function bind_params($stmt,$params)
    {
        $i=0; $outCount = 0; $this->output = array(); $refcur = ''; $lob_counter = 0;
      //  $j = 0;
        //foreach ($params as $param)
        for($j = 0; $j < count($params); $j++)
        {
            $param = $params[$j];
            if(!in_array($param['type'],$this->cur_ref) && $param['type'] != 'wblob' && $param['type'] != 'rblob'){

                if(!is_array($param['value'])){
                    // echo '######111 ' . $param['name'] . ' ';
                    $this->output[$param['value']] = $param['value'];
                    $bind = @oci_bind_by_name($stmt, $param['name'],$params[$j]['value']);
                    $this->error_handeling($bind,$stmt);
                }
                else{

                    $size = count($param['value'])==0?500:count($param['value']);
                    $item_length = count($param['value'])==0?500:-1;
                    $bind = @oci_bind_array_by_name($stmt, $param['name'],$params[$j]['value'],$size,$item_length,($param['type'] == '')?NULL:$param['type']);
                    $this->error_handeling($bind,$stmt);
                }
            }
            else if($param['type'] == 'wblob' || $param['type'] == 'rblob'){
                $this->lob[$lob_counter] = oci_new_descriptor($this->conn, OCI_D_LOB);
                $bind = @oci_bind_by_name($stmt,$param['name'], $this->lob[$lob_counter], -1, OCI_B_BLOB);
                $this->error_handeling($bind,$stmt);
                $lob_counter++;
            }
            else{
                $refcur[$i] = ocinewcursor ($this->conn);
                $bind = @oci_bind_by_name($stmt, $param['name'], $refcur[$i], -1, OCI_B_CURSOR);
                $this->error_handeling($bind,$stmt);

                $i++;
            }

        }
//die();
        return $refcur;
    }

 public   function excuteCursor($params,$refcur){
        $cursorCounter = 0;
        foreach ($params as $param)
        {
            if(in_array($param['type'],$this->cur_ref)){
                $exc = @oci_execute($refcur[$cursorCounter], OCI_DEFAULT);
                //$this->error_handeling($exc,$refcur[$cursorCounter]);
                if($exc){
                    $fetch = @oci_fetch_all($refcur[$cursorCounter], $this->output[$param['value']], null, null, OCI_FETCHSTATEMENT_BY_ROW);
                }
                else
                    $this->output[$param['value']] = array();
                //$this->error_handeling($fetch,$refcur[$cursorCounter]);
                $cursorCounter ++;
            }
        }
    }

public    function excuteBLOB($params,$lob){
        $lobCounter = 0;
        foreach ($params as $param)
        {
            if($param['type']== 'wblob' || $param['type']== 'rblob'){
                if($param['type']== 'wblob' && $param['value'] != '')
                    $this->lob[$lobCounter]->savefile($param['value']);
                else
                    $this->output[$param['value']] = $this->lob[$lobCounter];
                $lobCounter ++;
            }
        }
    }

public    function error_handeling($exc,$stmt){
        if (!$exc) {
            $controller = $this->CI->router->class;
            $err =oci_error($stmt);
            $res = array(
                'success'=>0,
                'err_msg'=>$err['message']
            );
            $this->output['success'] = 0;
            $this->output['err_msg'] = $err['message'];

            if($controller == 'ajax_handler'){
                header('Content-type: text/json');
                echo json_encode($this->output);
            }
            else{
                echo '<pre>';
                print_r($res['err_msg']);
                echo '<pre/>';
            }
            exit;
        }
    }


}