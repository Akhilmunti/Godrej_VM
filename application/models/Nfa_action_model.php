<?php

class Nfa_action_model extends CI_Model {

    private $tableName;
    private $secret;
    private $_batchImport;
	public $mSessionKey;

    function __construct() {
        parent::__construct();
        $CI = & get_instance();
        $CI->load->database();
        $CI->load->library('session');
		$this->load->model('common_model', 'common');
        //$this->table_parent = 'award_recomm_contract_salient';
	    //$mSessionKey = $this->session->userdata('session_id');
		//echo "session".$mSessionKey;
    }

    //Get salient with initiator
	public function get_salient_initiator($salient_id,$nfaType=null) {
		
		if($nfaType=="award_contract")
		{
			$tbl = "award_recomm_contract_salient AWDContractSalient ";
			$data = "AWDContractSalient.*,buyers.buyer_name";
			
			$joins[]=array("table"=>"buyers ","condition"=>"buyers.buyer_id = AWDContractSalient.initiated_by","type"=>'inner');
		}
		else if($nfaType=="award_procurement")
		{
			$tbl = "award_recomm_procurement_salient AWDProSalient ";
			$data = "AWDProSalient.*,buyers.buyer_name";
			
			$joins[]=array("table"=>"buyers ","condition"=>"buyers.buyer_id = AWDProSalient.initiated_by","type"=>'inner');
		}
		else if($nfaType=="bidder_contract")
		{
			$tbl = "bidder_contractor_salient BidContractSalient ";
			$data = "BidContractSalient.*,buyers.buyer_name";
			
			$joins[]=array("table"=>"buyers ","condition"=>"buyers.buyer_id = BidContractSalient.initiated_by","type"=>'inner');
		}
		else if($nfaType=="bidder_supplier")
		{
			$tbl = "bidder_supplier_salient BidSupplierSalient ";
			$data = "BidSupplierSalient.*,buyers.buyer_name";
			
			$joins[]=array("table"=>"buyers ","condition"=>"buyers.buyer_id = BidSupplierSalient.initiated_by","type"=>'inner');
		}else if($nfaType=="amendment_contract")
		{
			$tbl = "amendment_contract_salient AmendContractSalient ";
			$data = "AmendContractSalient.*,buyers.buyer_name";
			
			$joins[]=array("table"=>"buyers ","condition"=>"buyers.buyer_id = AmendContractSalient.initiated_by","type"=>'inner');
		}
		
		$where = array('id'=>$salient_id);
		$single = true;
		$group_by = "";
		
		
		$data = $this->common->select_fields_where_like_join($tbl, $data, $joins , $where, $single,'','',$group_by,$order_by,'',true);
		
		return $data;
		
		
        
    }
	
	public function getAllInitiated($logUserId,$nfaType=null) {
		
		if($nfaType=="award_contract")
		{
			$this->db->select('AWDRecommSalient.*,AWDSynopsLbl.synopsis_label,AWDRecommStatus.approver_level,approved_status');
			$this->db->from('award_recomm_contract_salient AWDRecommSalient');
			$this->db->join('award_recomm_contract_synopsis_label AWDSynopsLbl', 'AWDSynopsLbl.salient_id = AWDRecommSalient.id','inner');
			$this->db->join('award_recomm_contractor_status AWDRecommStatus', 'AWDRecommStatus.salient_id = AWDRecommSalient.id','inner');					
			$this->db->order_by('AWDRecommSalient.id', 'DESC');
		}
		else if($nfaType=="award_procurement")
		{
			$this->db->select('AWDRecommSalient.*,AWDSynopsLbl.synopsis_label,AWDRecommStatus.approver_level,approved_status');
			$this->db->from('award_recomm_procurement_salient AWDRecommSalient');
			$this->db->join('award_recomm_procurement_synopsis_label AWDSynopsLbl', 'AWDSynopsLbl.salient_id = AWDRecommSalient.id','inner');
			$this->db->join('award_recomm_procurement_status AWDRecommStatus', 'AWDRecommStatus.salient_id = AWDRecommSalient.id','inner');					
			$this->db->order_by('AWDRecommSalient.id', 'DESC');
		}
		else if($nfaType=="bidder_contract")
		{
			$this->db->select('BidContractSalient.*,BidContractStatus.approver_level,approved_status');
			$this->db->from('bidder_contractor_salient BidContractSalient');
			
			$this->db->join('bidder_contractor_status BidContractStatus', 'BidContractStatus.salient_id = BidContractSalient.id','inner');					
			$this->db->order_by('BidContractSalient.id', 'DESC');
		}
		// code added for Supplier
		else if($nfaType=="bidder_supplier")
		{
			$this->db->select('BidSupplierSalient.*,BidSupplierStatus.approver_level,approved_status');
			$this->db->from('bidder_supplier_salient BidSupplierSalient');
			
			$this->db->join('bidder_supplier_status BidSupplierStatus', 'BidSupplierStatus.salient_id = BidSupplierSalient.id','inner');					
			$this->db->order_by('BidSupplierSalient.id', 'DESC');
		}else if($nfaType=="amendment_contract")
		{
			$this->db->select('AmendContractSalient.*,AmendContractStatus.approver_level,approved_status');
			$this->db->from('amendment_contract_salient AmendContractSalient');
			
			$this->db->join('amendment_contract_status AmendContractStatus', 'AmendContractStatus.salient_id = AmendContractSalient.id','inner');					
			$this->db->order_by('AmendContractSalient.id', 'DESC');
		}
		else if($nfaType=="ldwaiver")
		{
			$this->db->select('LDWSalient.*,LDWStatus.approver_level,approved_status');
			$this->db->from('ld_waiver_salient LDWSalient');
			
			$this->db->join('ld_waiver_status LDWStatus', 'LDWStatus.salient_id = LDWSalient.id','inner');
			/* $this->db->where(array('status'=> 1,'approved_status'=> 0,'approver_id'=> $logUserId));
			$ignore = array('R', 'RT');

			$this->db->where_not_in('nfa_status', $ignore); */
			
			$this->db->order_by('LDWSalient.id', 'DESC');
		}
		$this->db->where(array('status'=> 1,'approved_status'=> 0,'approver_id'=> $logUserId));
		$ignore = array('R', 'RT');

		$this->db->where_not_in('nfa_status', $ignore);
        $data = array();
        $mQuery_Res = $this->db->get();
		//print_r($this->db->last_query());
        if ($mQuery_Res->num_rows() > 0) {
            $data = $mQuery_Res->result_array();
            return $data;
        } else {
            return false;
        }
    }
	
	public function getNfaInitiated($salient_id,$logUserId,$nfaType=null) {
		
		if($nfaType=="award_contract")
		{
			
			$this->db->select('AWDRecommSalient.*,AWDRecommStatus.approver_level,approved_status');
			$this->db->from('award_recomm_contract_salient AWDRecommSalient');
			
			$this->db->join('award_recomm_contractor_status AWDRecommStatus', 'AWDRecommStatus.salient_id = AWDRecommSalient.id','inner');
			$this->db->where(array('status'=> 1,'approved_status'=> 0,'approver_id'=> $logUserId,'AWDRecommSalient.id'=> $salient_id));
			
			$this->db->order_by('AWDRecommSalient.id', 'DESC');
		}
		else if($nfaType=="award_procurement")
		{
			
			$this->db->select('AWDProSalient.*,AWDProStatus.approver_level,approved_status');
			$this->db->from('award_recomm_procurement_salient AWDProSalient');
			
			$this->db->join('award_recomm_procurement_status AWDProStatus', 'AWDProStatus.salient_id = AWDProSalient.id','inner');
			$this->db->where(array('status'=> 1,'approved_status'=> 0,'approver_id'=> $logUserId,'AWDProSalient.id'=> $salient_id));
			
			$this->db->order_by('AWDProSalient.id', 'DESC');
		}
		else if($nfaType=="bidder_contract")
		{
			
			$this->db->select('BidContractSalient.*,BidContractStatus.approver_level,approved_status');
			$this->db->from('bidder_contractor_salient BidContractSalient');
			
			$this->db->join('bidder_contractor_status BidContractStatus', 'BidContractStatus.salient_id = BidContractSalient.id','inner');
			$this->db->where(array('status'=> 1,'approved_status'=> 0,'approver_id'=> $logUserId,'BidContractSalient.id'=> $salient_id));
			
			$this->db->order_by('BidContractSalient.id', 'DESC');
		}
		else if($nfaType=="bidder_supplier")
		{
			
			$this->db->select('BidSupplierSalient.*,BidSupplierStatus.approver_level,approved_status');
			$this->db->from('bidder_supplier_salient BidSupplierSalient');
			
			$this->db->join('bidder_supplier_status BidSupplierStatus', 'BidSupplierStatus.salient_id = BidSupplierSalient.id','inner');
			$this->db->where(array('status'=> 1,'approved_status'=> 0,'approver_id'=> $logUserId,'BidSupplierSalient.id'=> $salient_id));
			
			$this->db->order_by('BidSupplierSalient.id', 'DESC');
		}
		else if($nfaType=="amendment_contract")
		{
			
			$this->db->select('AmendContractSalient.*,AmendContractStatus.approver_level,approved_status');
			$this->db->from('amendment_contract_salient AmendContractSalient');
			
			$this->db->join('amendment_contract_status AmendContractStatus', 'AmendContractStatus.salient_id = AmendContractSalient.id','inner');
			$this->db->where(array('status'=> 1,'approved_status'=> 0,'approver_id'=> $logUserId,'AmendContractSalient.id'=> $salient_id));
			
			$this->db->order_by('AmendContractSalient.id', 'DESC');
		}
		else if($nfaType=="ldwaiver")
		{
			$this->db->select('LDWSalient.*,LDWStatus.approver_level,approved_status');
			$this->db->from('ld_waiver_salient LDWSalient');
			
			$this->db->join('ld_waiver_status LDWStatus', 'LDWStatus.salient_id = LDWSalient.id','inner');
			$this->db->where(array('status'=> 1,'approved_status'=> 0,'approver_id'=> $logUserId,'LDWSalient.id'=> $salient_id));
			//$this->db->join('subcategories', 'subcategories.subcategory_key = article.subcategory_key');
			//$this->db->where('buyer_status', 1);
			$this->db->order_by('LDWSalient.id', 'DESC');
		}
        $data = array();
        $mQuery_Res = $this->db->get();
		//print_r($this->db->last_query());
        if ($mQuery_Res->num_rows() > 0) {
            $data = $mQuery_Res->result_array();
            return $data;
        } else {
            return false;
        }
    }
	public function getNfaDraft($salient_id,$logUserId,$nfaType=null) {
		
		if($nfaType=="award_contract")
		{
			$this->db->select('AWDRecommSalient.*,AWDRecommStatus.approver_level,approved_status');
			$this->db->from('award_recomm_contract_salient AWDRecommSalient');
			
			$this->db->join('award_recomm_contractor_status AWDRecommStatus', 'AWDRecommStatus.salient_id = AWDRecommSalient.id','inner');
			$this->db->where(array('status'=> 0,'approved_status'=> 0,'initiated_by'=> $logUserId,'AWDRecommSalient.id'=> $salient_id));
			
			$this->db->order_by('AWDRecommSalient.id', 'DESC');
		}
		else if($nfaType=="award_procurement")
		{
			$this->db->select('AWDProSalient.*,AWDProStatus.approver_level,approved_status');
			$this->db->from('award_recomm_procurement_salient AWDProSalient');
			
			$this->db->join('award_recomm_procurement_status AWDProStatus', 'AWDProStatus.salient_id = AWDProSalient.id','inner');
			$this->db->where(array('status'=> 0,'approved_status'=> 0,'initiated_by'=> $logUserId,'AWDProSalient.id'=> $salient_id));
			
			$this->db->order_by('AWDProSalient.id', 'DESC');
		}
		else if($nfaType=="bidder_contract")
		{
			$this->db->select('BidContractSalient.*,BidContractStatus.approver_level,approved_status');
			$this->db->from('bidder_contractor_salient BidContractSalient');
			
			$this->db->join('bidder_contractor_status BidContractStatus', 'BidContractStatus.salient_id = BidContractSalient.id','inner');
			$this->db->where(array('status'=> 0,'approved_status'=> 0,'initiated_by'=> $logUserId,'BidContractSalient.id'=> $salient_id));
			
			$this->db->order_by('BidContractSalient.id', 'DESC');
		}
		else if($nfaType=="bidder_supplier")
		{
			$this->db->select('BidSupplierSalient.*,BidSupplierStatus.approver_level,approved_status');
			$this->db->from('bidder_supplier_salient BidSupplierSalient');
			
			$this->db->join('bidder_supplier_status BidSupplierStatus', 'BidSupplierStatus.salient_id = BidSupplierSalient.id','inner');
			$this->db->where(array('status'=> 0,'approved_status'=> 0,'initiated_by'=> $logUserId,'BidSupplierSalient.id'=> $salient_id));
			
			$this->db->order_by('BidSupplierSalient.id', 'DESC');
		}
        $data = array();
        $mQuery_Res = $this->db->get();
		//print_r($this->db->last_query());
        if ($mQuery_Res->num_rows() > 0) {
            $data = $mQuery_Res->result_array();
            return $data;
        } else {
            return false;
        }
    }
	
	//For Approved NFA
	public function getNfaApproved($logUserId,$nfaType=null) {
		
		if($nfaType=="award_contract")
		{
			$this->db->select('AWDRecommSalient.*,,AWDSynopsLbl.synopsis_label,AWDRecommStatus.approver_level,approved_status');
			$this->db->from('award_recomm_contract_salient AWDRecommSalient');
			
			$this->db->join('award_recomm_contractor_status AWDRecommStatus', 'AWDRecommStatus.salient_id = AWDRecommSalient.id','inner');
			$this->db->join('award_recomm_contract_synopsis_label AWDSynopsLbl', 'AWDSynopsLbl.salient_id = AWDRecommSalient.id','inner');
			$this->db->where(array('status'=> 1,'approved_status'=> 1,'nfa_status '=> 'A','approver_id !='=> ''));
			
			$this->db->order_by('AWDRecommSalient.id', 'DESC');
			$this->db->group_by('AWDRecommSalient.id');
			
			$query = $this->db->get();
			
			/* $sql = "SELECT AWDRecommSalient.*,AWDRecommStatus.approver_level,approved_status FROM award_recomm_contract_salient AWDRecommSalient INNER JOIN award_recomm_contractor_status AWDRecommStatus ON AWDRecommSalient.id = AWDRecommStatus.`salient_id` INNER JOIN ( SELECT `salient_id`, MAX(`approver_level`) max_view FROM award_recomm_contractor_status where approver_id!='' GROUP BY salient_id ) c ON AWDRecommStatus.salient_id = c.salient_id AND AWDRecommStatus.approver_level = c.max_View WHERE AWDRecommSalient.status = 1 AND AWDRecommSalient.nfa_status != 'AMD' AND AWDRecommStatus.`approver_id` != '' and AWDRecommStatus.approved_status=1 order by AWDRecommSalient.id desc";
			$query = $this->db->query($sql);
			$mQuery_Res = $query->result(); */
			//print_r($mQuery_Res);
		}
		else if($nfaType=="award_procurement")
		{
			$this->db->select('AWDRecommSalient.*,,AWDSynopsLbl.synopsis_label,AWDRecommStatus.approver_level,approved_status');
			$this->db->from('award_recomm_procurement_salient AWDRecommSalient');
			
			$this->db->join('award_recomm_procurement_status AWDRecommStatus', 'AWDRecommStatus.salient_id = AWDRecommSalient.id','inner');
			$this->db->join('award_recomm_procurement_synopsis_label AWDSynopsLbl', 'AWDSynopsLbl.salient_id = AWDRecommSalient.id','inner');
			$this->db->where(array('status'=> 1,'approved_status'=> 1,'nfa_status '=> 'A','approver_id !='=> ''));
			
			$this->db->order_by('AWDRecommSalient.id', 'DESC');
			$this->db->group_by('AWDRecommSalient.id');
			
			$query = $this->db->get();
			
			
		}
		else if($nfaType=="bidder_contract")
		{
			$this->db->select('BidContractSalient.*,BidContractStatus.approver_level,approved_status');
			$this->db->from('bidder_contractor_salient BidContractSalient');
			
			$this->db->join('bidder_contractor_status BidContractStatus', 'BidContractStatus.salient_id = BidContractSalient.id','inner');
			$this->db->where(array('status'=> 1,'approved_status'=> 1,'nfa_status '=> 'A','approver_id !='=> ''));
			
			$this->db->order_by('BidContractSalient.id', 'DESC');
			$this->db->group_by('BidContractSalient.id');
			
			$query = $this->db->get();
		}
		else if($nfaType=="bidder_supplier")
		{
			$this->db->select('BidSupplierSalient.*,BidSupplierStatus.approver_level,approved_status');
			$this->db->from('bidder_supplier_salient BidSupplierSalient');
			
			$this->db->join('bidder_supplier_status BidSupplierStatus', 'BidSupplierStatus.salient_id = BidSupplierSalient.id','inner');
			$this->db->where(array('status'=> 1,'approved_status'=> 1,'nfa_status '=> 'A','approver_id !='=> ''));
			
			$this->db->order_by('BidSupplierSalient.id', 'DESC');
			$this->db->group_by('BidSupplierSalient.id');
			
			$query = $this->db->get();
		}
		else if($nfaType=="ldwaiver")
		{
		
			$sql = "SELECT LDWSalient.*,LDWStatus.approver_level,approved_status FROM ld_waiver_salient LDWSalient INNER JOIN ld_waiver_status LDWStatus ON LDWSalient.id = LDWStatus.`salient_id` INNER JOIN ( SELECT `salient_id`, MAX(`approver_level`) max_view FROM ld_waiver_status where approver_id!='' GROUP BY salient_id ) c ON LDWStatus.salient_id = c.salient_id AND LDWStatus.approver_level = c.max_View WHERE LDWSalient.status = 1 AND LDWSalient.nfa_status != 'AMD' AND LDWStatus.`approver_id` != '' and LDWStatus.approved_status=1 order by LDWSalient.id desc";
			$query = $this->db->query($sql);
			$mQuery_Res = $query->result();
			
		}
		
		
       
        $data = array();
       
        if ($query->num_rows() > 0) {
            $data = $query->result_array();
            return $data;
        } else {
            return false;
        }
    }
	
			
	
	
	public function getNfaData($param=null,$nfaType=null) {
		
        if($nfaType=="award_contract")
		{
			$this->db->select('AWDRecommSalient.*,AWDSynopsLbl.synopsis_label');
			$this->db->from('award_recomm_contract_salient AWDRecommSalient');
			$this->db->join('award_recomm_contract_synopsis_label AWDSynopsLbl', 'AWDSynopsLbl.salient_id = AWDRecommSalient.id','inner');
			
			
			if($param)
				$this->db->where($param);
			
			$this->db->order_by('AWDRecommSalient.id', 'DESC');
			
		}
		else if($nfaType=="award_procurement")
		{
			$this->db->select('AWDSalient.*,AWDSynopsLbl.synopsis_label');
			$this->db->from('award_recomm_procurement_salient AWDSalient');
			$this->db->join('award_recomm_procurement_synopsis_label AWDSynopsLbl',"AWDSynopsLbl.salient_id = AWDSalient.id" , "inner");
			
			if($param)
				$this->db->where($param);
			
			$this->db->order_by('AWDSalient.id', 'DESC');
			
		}
		else if($nfaType=="bidder_contract")
		{
			$this->db->select('BidContractSalient.*');
			$this->db->from('bidder_contractor_salient BidContractSalient');
			
		
			if($param)
				$this->db->where($param);
			$this->db->group_by('BidContractSalient.id');
			$this->db->order_by('BidContractSalient.id', 'DESC');
			
		}
		else if($nfaType=="bidder_supplier")
		{
			$this->db->select('BidSupplierSalient.*');
			$this->db->from('bidder_supplier_salient BidSupplierSalient');
			
		
			if($param)
				$this->db->where($param);
			$this->db->group_by('BidSupplierSalient.id');
			$this->db->order_by('BidSupplierSalient.id', 'DESC');
			
		}
		
        $data = array();
        $mQuery_Res = $this->db->get();
		//print_r($this->db->last_query());
        if ($mQuery_Res->num_rows() > 0) {
            $data = $mQuery_Res->result_array();
            return $data;
        } else {
            return false;
        }
    }
	
	public function getNfaStatus($salient_id,$logUserId,$approver_level,$nfaSt='',$nfaType=null) {
		
		if($nfaType=="award_contract")
		{
			if($nfaSt=="draft")
			{
				$cond = array('AWDRecommSalient.id'=> $salient_id,'AWDRecommStatus.approver_level<='=> $approver_level,'AWDRecommStatus.approver_level>='=> ($approver_level-1));
				
			}
			else
			{
				
				$cond = array('AWDRecommSalient.id'=> $salient_id,'AWDRecommStatus.approver_level<='=> $approver_level,'AWDRecommStatus.approver_level>='=> ($approver_level-1));
			}
			
			$data = $this->nfaStatusDetails($cond,$nfaType);
		}
		else if($nfaType=="award_procurement")
		{
			if($nfaSt=="draft")
				$cond = array('status'=> 0,'AWDProSalient.id'=> $salient_id,'AWDProStatus.approver_level<='=> $approver_level);
			else
				$cond = array('status'=> 1,'AWDProSalient.id'=> $salient_id,'AWDProStatus.approver_level<='=> $approver_level);
			$data = $this->nfaStatusDetails($cond,$nfaType);
		}
		else if($nfaType=="bidder_contract")
		{
			if($nfaSt=="draft")
				$cond = array('status'=> 0,'BidContractSalient.id'=> $salient_id,'BidContractStatus.approver_level<='=> $approver_level);
			else
				$cond = array('status'=> 1,'BidContractSalient.id'=> $salient_id,'BidContractStatus.approver_level<='=> $approver_level);
			$data = $this->nfaStatusDetails($cond,$nfaType);
		}
		else if($nfaType=="bidder_supplier")
		{
			
			if($nfaSt=="draft")
			{
				$cond = array('status'=> 0,'BidSupplierSalient.id'=> $salient_id,'BidSupplierStatus.approver_level<='=> $approver_level);
			}else{
				
				$cond = array('status'=> 1,'BidSupplierSalient.id'=> $salient_id,'BidSupplierStatus.approver_level<='=> $approver_level);
			}
			$data = $this->nfaStatusDetails($cond,$nfaType);
			
		}
		else if($nfaType=="amendment_contract")
		{
			/* if($nfaSt=="draft")
			{ */
				$cond = array('AmendContractSalient.id'=> $salient_id,'AmendContractStatus.approver_level<='=> $approver_level,'AmendContractStatus.approver_level>='=> ($approver_level-1));
				
			//}
			/* else
			{
				
				$cond = array('AWDRecommSalient.id'=> $salient_id,'AmendContractStatus.approver_level<='=> $approver_level,'AWDRecommStatus.approver_level>='=> ($approver_level-1));
			} */
			
			$data = $this->nfaStatusDetails($cond,$nfaType);
		}
		//print_r($this->db->last_query());
		return $data;
		
		
    }
	
	public function nfaStatusDetails($cond,$nfaType=null) {
		if($nfaType=="award_contract")
		{
			$this->db->select('AWDRecommStatus.approver_id,AWDRecommStatus.approver_level,approved_status,buyers.buyer_name');
			$this->db->from('award_recomm_contract_salient AWDRecommSalient');
			
			$this->db->join('award_recomm_contractor_status AWDRecommStatus', 'AWDRecommStatus.salient_id = AWDRecommSalient.id','inner');
			//$this->db->join('buyers', 'buyers.buyer_id = AWDRecommStatus.approver_id',"inner");
			$this->db->join('buyers', 'buyers.buyer_id = AWDRecommStatus.approver_id',"left");
			
			$this->db->where($cond);
		   
			$this->db->order_by('AWDRecommStatus.approver_level', 'asc');
		}
		else if($nfaType=="award_procurement")
		{
			$this->db->select('AWDProStatus.approver_level,approved_status,buyers.buyer_name');
			$this->db->from('award_recomm_procurement_salient AWDProSalient');
			
			$this->db->join('award_recomm_procurement_status AWDProStatus', 'AWDProStatus.salient_id = AWDProSalient.id','inner');
			$this->db->join('buyers', 'buyers.buyer_id = AWDProStatus.approver_id',"inner");
			
			$this->db->where($cond);
		   
			$this->db->order_by('AWDProStatus.approver_level', 'asc');
		}
		else if($nfaType=="bidder_contract")
		{
			$this->db->select('BidContractStatus.approver_level,approved_status,buyers.buyer_name');
			$this->db->from('bidder_contractor_salient BidContractSalient');
			
			$this->db->join('bidder_contractor_status BidContractStatus', 'BidContractStatus.salient_id = BidContractSalient.id','inner');
			$this->db->join('buyers', 'buyers.buyer_id = BidContractStatus.approver_id',"inner");
			
			$this->db->where($cond);
		   
			$this->db->order_by('BidContractStatus.approver_level', 'asc');
		}
		else if($nfaType=="bidder_supplier")
		{
			$this->db->select('BidSupplierStatus.approver_level,approved_status,buyers.buyer_name');
			$this->db->from('bidder_supplier_salient BidSupplierSalient');
			
			$this->db->join('bidder_supplier_status BidSupplierStatus', 'BidSupplierStatus.salient_id = BidSupplierSalient.id','inner');
			$this->db->join('buyers', 'buyers.buyer_id = BidSupplierStatus.approver_id',"inner");
			
			$this->db->where($cond);
		   
			$this->db->order_by('BidSupplierStatus.approver_level', 'asc');
		}
		else if($nfaType=="amendment_contract")
		{
			$this->db->select('AmendContractStatus.approver_id,AmendContractStatus.approver_level,approved_status,buyers.buyer_name');
			$this->db->from('amendment_contract_salient AmendContractSalient');
			
			$this->db->join('amendment_contract_status AmendContractStatus', 'AmendContractStatus.salient_id = AmendContractSalient.id','inner');
			
			$this->db->join('buyers', 'buyers.buyer_id = AmendContractStatus.approver_id',"left");
			
			$this->db->where($cond);
		   
			$this->db->order_by('AmendContractStatus.approver_level', 'asc');
		}
		
        $data = array();
        $mQuery_Res = $this->db->get();
		//print_r($this->db->last_query());
        if ($mQuery_Res->num_rows() > 0) {
            $data = $mQuery_Res->result_array();
            return $data;
        } else {
            return false;
        }
    }
	
	public function getReturnedNfa($nfaType=null) {
		
		if($nfaType=="award_contract")
		{
			$this->db->select('AWDRecommSalient.*,AWDSynopsLbl.synopsis_label');
			$this->db->from('award_recomm_contract_salient AWDRecommSalient');
			$this->db->join('award_recomm_contract_synopsis_label AWDSynopsLbl', 'AWDSynopsLbl.salient_id = AWDRecommSalient.id','inner');
			$this->db->order_by('AWDRecommSalient.id', 'DESC');
		
			
			
		}
		else if($nfaType=="award_procurement")
		{
			$this->db->select('AWDProSalient.*');
			$this->db->from('award_recomm_procurement_salient AWDProSalient');
			$this->db->order_by('AWDProSalient.id', 'DESC'); 
		}
		else if($nfaType=="bidder_contract")
		{
			$this->db->select('BidContractSalient.*');
			$this->db->from('bidder_contractor_salient BidContractSalient');
			$this->db->order_by('BidContractSalient.id', 'DESC'); 
		}
		else if($nfaType=="bidder_supplier")
		{
			$this->db->select('BidSupplierSalient.*');
			$this->db->from('bidder_supplier_salient BidSupplierSalient');
			$this->db->order_by('BidSupplierSalient.id', 'DESC'); 
		}
		else if($nfaType=="ldwaiver")
		{
			$this->db->select('LDWSalient.*');
			$this->db->from('ld_waiver_salient LDWSalient');
			$this->db->order_by('LDWSalient.id', 'DESC');
		}
		$mSessionKey = $this->session->userdata('session_id');
		//echo $mSessionKey ;
		//echo "var".$this->mSessionKey;
        
		$this->db->where('initiated_by', $mSessionKey,FALSE);
        $this->db->where('status', 1,FALSE);
		$this->db->where("nfa_status", "'R'", FALSE);
        $this->db->order_by('id', 'DESC');
       
        
		
        $data = array();
        $mQuery_Res = $this->db->get();
		//print_r($this->db->last_query());
        if ($mQuery_Res->num_rows() > 0) {
            $data = $mQuery_Res->result_array();
            return $data;
        } else {
            return false;
        }
    }
	
	public function chkPreApproved($salient_id,$approver_level,$nfaType=null) {
		
		$preLevel_array = array();
		$preLevel = $approver_level-1;
		//for($i=1;$i<$approver_level;$i++)
		for($i=1;$i<=$approver_level;$i++)
			$preLevel_array[$i] = $i;
		
        $this->db->select('*');
		if($nfaType=="award_contract")
		{
			$this->db->from('award_recomm_contractor_status');	
			
			
		}
		else if($nfaType=="award_procurement")
		{
			$this->db->from('award_recomm_procurement_status');				
			
		}
		else if($nfaType=="bidder_contract")
		{
			$this->db->from('bidder_contractor_status');
			
			
		}
		else if($nfaType=="bidder_supplier")
		{
			$this->db->from('bidder_supplier_status');
			
			
		}
		else if($nfaType=="amendment_contract")
		{
			$this->db->from('amendment_contract_status');	
			
			
		}
		else if($nfaType=="ldwaiver")
		{
			$this->db->from('ld_waiver_status');
		
		}
        $this->db->where(array('salient_id'=> $salient_id));
		$this->db->where_in('approver_level', $preLevel_array );
		$this->db->where("(approved_status=1 OR approver_id=0 )", NULL, FALSE);
		      
		
        $data = array();
        $mQuery_Res = $this->db->get();
		//print_r($this->db->last_query());  
		if ($mQuery_Res->num_rows() == $preLevel) {
          
            return 1;
        } else {
            return 0;
        }
    }
	
	public function updateData($param, $data,$nfaType=null) {
		if($nfaType=="award_contract")
		{
			$statusTbl = "award_recomm_contractor_status";
			
			
		}
		else if($nfaType=="award_procurement")
		{
			$statusTbl = "award_recomm_procurement_status"; 	
		}
		else if($nfaType=="bidder_contract")
		{
			
			$statusTbl = "bidder_contractor_status";
			
			
		}
		else if($nfaType=="bidder_supplier")
		{
			
			$statusTbl = "bidder_supplier_status";
			
			
		}
		else if($nfaType=="amendment_contract")
		{
			
			$statusTbl = "amendment_contract_status";
			
			
		}
		else if($nfaType=="ldwaiver")
		{
			$statusTbl = 'ld_waiver_status';
		
		}
        $this->db->set($data);
        $this->db->where($param);
        $query1 = $this->db->update($statusTbl);
		//print_r($this->db->last_query());    
        if ($query1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
	
	public function get_report_users($nfaStatus=null) {
		
		
		$this->db->select('buyers.*');
        $this->db->from("buyers");
		if($nfaStatus=="Initiated")
			$this->db->join('award_recomm_contract_salient AWDContractSalient', 'AWDContractSalient.initiated_by = buyers.buyer_id');
		else if($nfaStatus=="Cancelled")
			$this->db->join('award_recomm_contract_salient AWDContractSalient', 'AWDContractSalient.cancelled_by = buyers.buyer_id');
		else
			$this->db->join('award_recomm_contractor_status AWDContractStatus', 'AWDContractStatus.approver_id = buyers.buyer_id');
		//$param = array("buyer_role!="=>'PCM');
		if($nfaStatus!="Initiated" && $nfaStatus!="Cancelled")
			$this->db->where("buyer_role!=",'PCM');
		$this->db->group_by('buyer_id');
		$this->db->order_by('buyer_name', 'asc');
       
        $data = array();
        $mQuery_Res = $this->db->get();
		//print_r($this->db->last_query());   
		//exit;
        if ($mQuery_Res->num_rows() > 0) {
            $data = $mQuery_Res->result();
			//print_r($data);
            return $data;
        } else {
            return false;
        }
		
        return $res;
    }
	
	/* public function getReportData($nfaStatus=null,$buyer_id=null,$start_date=null,$end_date=null) {

		
		
		if($nfaStatus=="Initiated")
		{
			$this->db->select('LDWSalient.*,LDWStatus.approver_level,approved_status');
			$this->db->from('ld_waiver_salient LDWSalient');
			
			$this->db->join('ld_waiver_status LDWStatus', 'LDWStatus.salient_id = LDWSalient.id','inner');
			$this->db->where(array('status'=> 1,'approved_status'=> 0));
			if($buyer_id)
			{
				$this->db->where(array('initiated_by'=> $buyer_id));
			}
			if($start_date)
			{
				$this->db->where(array('date(initiated_date)>='=> $start_date));
			}
			if($end_date)
			{
				$this->db->where(array('date(initiated_date)<='=> $end_date));
			}
			$ignore = array('R', 'RT');
			$this->db->where_not_in('nfa_status', $ignore);
			$this->db->group_by('LDWSalient.id');
			$this->db->order_by('LDWSalient.id', 'DESC');
			$mQuery_Res = $this->db->get();
			//print_r($this->db->last_query());
		}
		else if($nfaStatus=="Approved")
		{
			
			
			$sql = "SELECT LDWSalient.*,LDWStatus.approver_level,approved_status,LDWStatus.approver_id FROM ld_waiver_salient LDWSalient INNER JOIN ld_waiver_status LDWStatus ON LDWSalient.id = LDWStatus.`salient_id`   WHERE LDWSalient.status = 1 AND LDWSalient.nfa_status != 'AMD' AND LDWStatus.`approver_id` != '' and LDWStatus.approved_status=1 ";
			
			//echo $sql;
			
			if($buyer_id)
			{
				$sql .=" and LDWStatus.approver_id='$buyer_id'";
			}
			if($start_date)
			{
				$sql .=" and LDWStatus.approved_date>='$start_date'";
			}
			if($end_date)
			{
				$sql .=" and LDWStatus.approved_date<='$end_date'";
			}
			$sql .=" group by LDWSalient.id order by LDWSalient.id desc";
			
			$mQuery_Res = $this->db->query($sql);
			
        
		}
		else if($nfaStatus=="Returned")
		{
			$this->db->select('LDWSalient.*');
			$this->db->from('ld_waiver_salient LDWSalient');
			$this->db->join('ld_waiver_status LDWStatus', 'LDWStatus.salient_id = LDWSalient.id','inner');
			$mSessionKey = $this->session->userdata('session_id');
			//echo $mSessionKey ;
			//echo "var".$this->mSessionKey;
			
			//$this->db->where('initiated_by', $mSessionKey,FALSE);
			$this->db->where('status', 1,FALSE);
			$this->db->where("nfa_status", "'R'", FALSE);
			if($buyer_id)
			{
				$this->db->where(array('returned_by'=> $buyer_id));
			}
			if($start_date)
			{
				$this->db->where(array('date(returned_date)>='=> $start_date));
			}
			if($end_date)
			{
				$this->db->where(array('date(returned_date)<='=> $end_date));
			}
			
			$this->db->group_by('LDWSalient.id');
			$this->db->order_by('LDWSalient.id', 'DESC');
			$mQuery_Res = $this->db->get();
		}
		else if($nfaStatus=="Cancelled")
		{
			
			$param = array('status'=> 0,'nfa_status '=> 'C');
           
			if($buyer_id)
			{
				$param['cancelled_by']= $buyer_id;
			}
			if($start_date)
			{
				$param['cancelled_date>=']= $start_date;
			}
			if($end_date)
			{
				$param['cancelled_date<='] =  $end_date;
			}
			$data['records'] = $this->getNfaData($param);
			//print_r($data);
			return $data['records'];
			//$this->db->group_by('LDWSalient.id');
			//$this->db->order_by('LDWSalient.id', 'DESC');
			//$mQuery_Res = $this->db->get();
			//print_r($this->db->last_query());
		}
		if($mQuery_Res)	
		{
			if ($mQuery_Res->num_rows() > 0) {
				$data = $mQuery_Res->result_array();
				return $data;
			} else {
				return false;
			}
		}

	}
	 */
	//Get Level with Roles
	
	/* public function getAllLevelRole($param=null) {
		
        $this->db->select('*');
        $this->db->from('award_recomm_contractor_role_level');
		
		
		
		$this->db->where($param);
        
        $this->db->order_by('id', 'ASC');
				
        $data = array();
        $mQuery_Res = $this->db->get();
		//print_r($this->db->last_query());
        if ($mQuery_Res->num_rows() > 0) {
            $data = $mQuery_Res->result();
            return $data;
        } else {
            return false;
        }
    } */
	
	public function getAllLevelRole($param=null) {
		
        $this->db->select('*');
        $this->db->from('nfa_approvers_role_level');
		
		
		
		$this->db->where($param);
        
        $this->db->order_by('id', 'ASC');
				
        $data = array();
        $mQuery_Res = $this->db->get();
		//print_r($this->db->last_query());
        if ($mQuery_Res->num_rows() > 0) {
            $data = $mQuery_Res->result();
            return $data;
        } else {
            return false;
        }
    }
	public function getAllLevelRole_approvers($level_max=null,$salient_id=null,$nfaType=null,$view=null,$approver_level=null) 
	{
		
		      
        $this->db->from('nfa_approvers_role_level NFARole');
		$param = array("level<="=>$level_max);
		
		if($nfaType=="award_contract")
		{
			
			if($salient_id)
			{
				$this->db->select('NFARole.*,AWDRecommStatus.*');
				$this->db->join('award_recomm_contractor_status AWDRecommStatus', 'AWDRecommStatus.approver_level = NFARole.level','inner');
				
				$cond =array('AWDRecommStatus.salient_id'=>$salient_id);
				if($approver_level)
				{
									
					//$cond =array('AWDRecommStatus.approver_level>'=>($approver_level-1),'AWDRecommStatus.approver_level<='=>($approver_level));
					$cond['AWDRecommStatus.approver_level>='] = ($approver_level-1);
					$cond['AWDRecommStatus.approver_level<='] = ($approver_level);					
				
				}
			
			}
			else
			{
				$this->db->select('NFARole.*');
				
			} 
		}else if($nfaType=="award_procurement")
		 {
			
			
			if($salient_id)
			{
				$this->db->select('NFARole.*,AWDRecommStatus.*');
				$this->db->join('award_recomm_procurement_status AWDRecommStatus', 'AWDRecommStatus.approver_level = NFARole.level','inner');
				
				$cond =array('AWDRecommStatus.salient_id'=>$salient_id);
				if($approver_level)
				{
									
					//$cond =array('AWDRecommStatus.approver_level>'=>($approver_level-1),'AWDRecommStatus.approver_level<='=>($approver_level));
					$cond['AWDRecommStatus.approver_level>='] = ($approver_level-1);
					$cond['AWDRecommStatus.approver_level<='] = ($approver_level);					
				
				}
			
			}
			else
			{
				$this->db->select('NFARole.*');
				
			} 
			
		
		}else if($nfaType=="bidder_contract") {
			if($salient_id)
			{
				$this->db->select('NFARole.*,AWDRecommStatus.*');
				$this->db->join('bidder_contractor_status AWDRecommStatus', 'AWDRecommStatus.approver_level = NFARole.level','inner');
				
				$cond =array('AWDRecommStatus.salient_id'=>$salient_id);
				if($approver_level)
				{ 					
					//$cond =array('AWDRecommStatus.approver_level>'=>($approver_level-1),'AWDRecommStatus.approver_level<='=>($approver_level));
					$cond['AWDRecommStatus.approver_level>='] = ($approver_level-1);
					$cond['AWDRecommStatus.approver_level<='] = ($approver_level); 
				} 
			}
			else
			{
				$this->db->select('NFARole.*');
				
			} 
		}
		else if($nfaType=="bidder_supplier") {
			if($salient_id)
			{
				$this->db->select('NFARole.*,AWDRecommStatus.*');
				$this->db->join('bidder_supplier_status AWDRecommStatus', 'AWDRecommStatus.approver_level = NFARole.level','inner');
				
				$cond =array('AWDRecommStatus.salient_id'=>$salient_id);
				if($approver_level)
				{ 					
					//$cond =array('AWDRecommStatus.approver_level>'=>($approver_level-1),'AWDRecommStatus.approver_level<='=>($approver_level));
					$cond['AWDRecommStatus.approver_level>='] = ($approver_level-1);
					$cond['AWDRecommStatus.approver_level<='] = ($approver_level); 
				} 

			}
		}
		else if($nfaType=="amendment_contract")
		{
			
			if($salient_id)
			{
				$this->db->select('NFARole.*,AmendContractStatus.*');
				$this->db->join('amendment_contract_status AmendContractStatus', 'AmendContractStatus.approver_level = NFARole.level','inner');
				
				$cond =array('AmendContractStatus.salient_id'=>$salient_id);
				if($approver_level)
				{
									
					$cond['AmendContractStatus.approver_level>='] = ($approver_level-1);
					$cond['AmendContractStatus.approver_level<='] = ($approver_level);					
				
				}
			
			}
			else
			{
				$this->db->select('NFARole.*');
				
			} 
		}
		if($level_max)
			$cond['level<='] = $level_max;	
		$this->db->where($cond);
		
        
        $this->db->order_by('NFARole.id', 'ASC');
				
        $data = array();
        $mQuery_Res = $this->db->get();
		//print_r($this->db->last_query());
			
			if ($mQuery_Res->num_rows() > 0) {
				$data = $mQuery_Res->result();
				return $data;
			} else {
				return false;
			}
    	
	}
	//Get Log Details
	public function getNfa_logs($salient_id=null,$nfaType=null) {
		
      
        
		
		
		if($nfaType=="award_contract")
		{
			$this->db->from('award_recomm_contractor_nfa_logs NFALogs');
			
			if($salient_id)
			{
				$this->db->select('NFALogs.*,buyers.buyer_name,buyer_role');
				$this->db->join('buyers ', 'buyers.buyer_id = NFALogs.buyer_id','inner');
				
				$cond =array('NFALogs.salient_id'=>$salient_id);
			
			}
			
		}else if($nfaType=="award_procurement") {
			
			if($salient_id)
			{ 
				$this->db->select('NFARole.*,AWDRecommStatus.*');
				// $this->db->select('NFARole.*,AWDRecommStatus.approver_id');
				$this->db->join('award_recomm_procurement_status AWDRecommStatus', 'AWDRecommStatus.approver_level = NFARole.level','inner');
				
				$cond =array('AWDRecommStatus.salient_id'=>$salient_id);
			
			}
			else
			{
				$this->db->select('NFARole.*');
				
			}  
		}
		
		
        
        $this->db->order_by('NFALogs.id', 'ASC');
				
        $data = array();
        $mQuery_Res = $this->db->get();
		//print_r($this->db->last_query());
		 
        if ($mQuery_Res->num_rows() > 0) {
            $data = $mQuery_Res->result_array();
            return $data;
        } else {
            return false;
        }
    }
	
	public function getNfaDetails_userLevel($salient_id=null,$approver_id=null,$nfaType=null) {
		if($nfaType=="award_contract")
		{
			$this->db->select('AWDRecommSalient.*,AWDRecommStatus.approver_level');
			$this->db->from('award_recomm_contract_salient AWDRecommSalient');
			
			$this->db->join('award_recomm_contractor_status AWDRecommStatus', 'AWDRecommStatus.salient_id = AWDRecommSalient.id','inner');
			
			$cond =array('AWDRecommStatus.salient_id'=>$salient_id,'AWDRecommStatus.approver_id'=>$approver_id);
			$this->db->where($cond);
		   
			
		}
		else if($nfaType=="award_procurement")
		{
			$this->db->select('AWDProSalient.*,AWDProStatus.approver_level');
			$this->db->from('award_recomm_procurement_salient AWDProSalient');
			
			$this->db->join('award_recomm_procurement_status AWDProStatus', 'AWDProStatus.salient_id = AWDProSalient.id','inner');
			
			$cond =array('AWDProStatus.salient_id'=>$salient_id,'AWDProStatus.approver_id'=>$approver_id);
			$this->db->where($cond);
		   
			//$this->db->order_by('AWDProStatus.approver_level', 'asc');
		}
		else if($nfaType=="bidder_contract")
		{
			$this->db->select('BidContractSalient.*,BidContractStatus.approver_level');
			$this->db->from('bidder_contractor_salient BidContractSalient');
			
			$this->db->join('bidder_contractor_status BidContractStatus', 'BidContractStatus.salient_id = BidContractSalient.id','inner');
			
			$cond =array('BidContractStatus.salient_id'=>$salient_id,'BidContractStatus.approver_id'=>$approver_id);
			$this->db->where($cond);
		   
			
		}
		else if($nfaType=="bidder_supplier")
		{
			$this->db->select('BidSupplierSalient.*,BidSupplierStatus.approver_level');
			$this->db->from('bidder_supplier_salient BidSupplierSalient');
			
			$this->db->join('bidder_supplier_status BidSupplierStatus', 'BidSupplierStatus.salient_id = BidSupplierSalient.id','inner');
			
			$cond =array('BidSupplierStatus.salient_id'=>$salient_id,'BidSupplierStatus.approver_id'=>$approver_id);
			$this->db->where($cond);
		   
			
		}
		else if($nfaType=="amendment_contract")
		{
			$this->db->select('AmendContractSalient.*,AmendContractStatus.approver_level');
			$this->db->from('amendment_contract_salient AmendContractSalient');
			
			$this->db->join('amendment_contract_status AmendContractStatus', 'AmendContractStatus.salient_id = AmendContractSalient.id','inner');
			
			$cond =array('AmendContractStatus.salient_id'=>$salient_id,'AmendContractStatus.approver_id'=>$approver_id);
			$this->db->where($cond);
		   
		}
        $data = array();
        $mQuery_Res = $this->db->get();
		//print_r($this->db->last_query());
        if ($mQuery_Res->num_rows() > 0) {
             $data = $mQuery_Res->row_array();
            return $data;
        } else {
            return false;
        }
    }
	//Gett all low level users for sending mail
	
	public function get_low_level_users($salient_id,$approver_level,$nfaType=null) {
		
        $preLevel = $approver_level-1;
		
		if($nfaType=="award_contract")
		{
			$data = "AWDContractStatus.*,buyers.buyer_name,buyers.buyer_email";
			$tbl = "award_recomm_contractor_status AWDContractStatus ";
			$joins[]=array("table"=>"buyers ","condition"=>"buyers.buyer_id = AWDContractStatus.approver_id","type"=>'inner');
			$where = array('AWDContractStatus.salient_id'=>$salient_id,'AWDContractStatus.approver_id!='=>0);
			
		}
		else if($nfaType=="award_procurement")
		{
			$data = "AWDProStatus.*,buyers.buyer_name,buyers.buyer_email";
			$tbl = "award_recomm_procurement_status AWDProStatus ";
			$joins[]=array("table"=>"buyers ","condition"=>"buyers.buyer_id = AWDProStatus.approver_id","type"=>'inner');
			$where = array('AWDProStatus.salient_id'=>$salient_id,'AWDProStatus.approver_level<'=>$approver_level);
			
		}
		else if($nfaType=="bidder_contract")
		{
			$data = "AWDContractStatus.*,buyers.buyer_name,buyers.buyer_email";
			$tbl = "award_recomm_contractor_status AWDContractStatus ";
			$joins[]=array("table"=>"buyers ","condition"=>"buyers.buyer_id = AWDContractStatus.approver_id","type"=>'inner');
			$where = array('AWDContractStatus.salient_id'=>$salient_id,'AWDContractStatus.approver_level<'=>$approver_level);
			
		}
		else if($nfaType=="bidder_supplier")
		{
			$data = "AWDSupplierStatus.*,buyers.buyer_name,buyers.buyer_email";
			$tbl = "bidder_supplier_status AWDSupplierStatus ";
			$joins[]=array("table"=>"buyers ","condition"=>"buyers.buyer_id = AWDSupplierStatus.approver_id","type"=>'inner');
			$where = array('AWDSupplierStatus.salient_id'=>$salient_id,'AWDSupplierStatus.approver_level<'=>$approver_level);
			
		}
		else if($nfaType=="amendment_contract")
		{
			$data = "AmendContractStatus.*,buyers.buyer_name,buyers.buyer_email";
			$tbl = "amendment_contract_status AmendContractStatus ";
			$joins[]=array("table"=>"buyers ","condition"=>"buyers.buyer_id = AmendContractStatus.approver_id","type"=>'inner');
			$where = array('AmendContractStatus.salient_id'=>$salient_id,'AmendContractStatus.approver_id!='=>0);
			
		}
		else if($nfaType=="ldwaiver")
		{
			$this->db->from('ld_waiver_status');
		
		}
		
		
		$single = false;
		$group_by = "";
		$order_by='approver_level asc';
		
		$data = $this->common->select_fields_where_like_join($tbl, $data, $joins , $where, $single,'','',$group_by,$order_by,'',true);
		return $data;
		
    }
	
	//Get Level with Roles for Aprovers
	
	public function getApproverLevelRole($param=null) {
		
        $this->db->select('*');
        $this->db->from('nfa_approvers_role_level');
		
		
		
		$this->db->where($param);
        
        $this->db->order_by('id', 'ASC');
				
        $data = array();
        $mQuery_Res = $this->db->get();
		//print_r($this->db->last_query());
        if ($mQuery_Res->num_rows() > 0) {
            $data = $mQuery_Res->result();
            return $data;
        } else {
            return false;
        }
    }
	//select max level
	public function getMaxApproverLevel($param,$nfaType=null) {
        $this->db->select_max('approver_level');
		if($nfaType=="award_contract")
		{
			$this->db->from('award_recomm_contractor_status');
			
			
		}
		else if($nfaType=="award_procurement")
		{
			$this->db->from('award_recomm_procurement_status'); 
		}
		else if($nfaType=="bidder_contract")
		{
			$this->db->from('bidder_contractor_status');
			
			
		}
		else if($nfaType=="bidder_supplier")
		{
			$this->db->from('bidder_supplier_status');
			
			
		}
		else if($nfaType=="amendment_contract")
		{
			$this->db->from('amendment_contract_status');
			
			
		}
		else if($nfaType=="ldwaiver")
		{
			$this->db->from('ld_waiver_status');
		
		}
       
        $this->db->where($param);
       
        $data = array();
        $mQuery_Res = $this->db->get();
        if ($mQuery_Res->num_rows() > 0) {
            $data = $mQuery_Res->row_array();
            return $data;
        } else {
            return false;
        }
    }
}

?>