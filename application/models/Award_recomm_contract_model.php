<?php

class Award_recomm_contract_model extends CI_Model {

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
        $this->table_parent = 'award_recomm_contract_salient';
	   
    }

    function addParent($data) {
        $query = $this->db->insert($this->table_parent, $data);
        if ($this->db->affected_rows() > 0) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }
	//InsertData
	function addPackages($data) {
        $query = $this->db->insert("award_recomm_contract_packages", $data);
        if ($this->db->affected_rows() > 0) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }
	function addLabels($data) {
        $query = $this->db->insert("award_recomm_contract_synopsis_label", $data);
        if ($this->db->affected_rows() > 0) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }
	function addSynopsisPackage($data) {
		$query = $this->db->insert("award_recomm_contract_synopsis_packages", $data);
		print_r($this->db->last_query()); 
        if ($this->db->affected_rows() > 0) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }
	
	function addAppointment($data) {
        $query = $this->db->insert("award_recomm_contractor_appointment_dates", $data);
        if ($this->db->affected_rows() > 0) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }
	function addAwardEfficiency($data) {
        $query = $this->db->insert("award_recomm_contractor_award_efficiency", $data);
        if ($this->db->affected_rows() > 0) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }
	//Inser Final bidders
	
	function addFinalBidders($data) {
        $query = $this->db->insert("award_recomm_contract_final_bidders", $data);
        if ($this->db->affected_rows() > 0) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }
	function addFinalBidScenario($data) {
        $query = $this->db->insert("award_recomm_contract_final_bid_scenario", $data);
        if ($this->db->affected_rows() > 0) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }
	
	function addMajorTerm($data) {
        $query = $this->db->insert("award_recomm_contractor_major_terms", $data);
        if ($this->db->affected_rows() > 0) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }
	
	function addFileUploads($data) {
		$table_name = "ld_waiver_uploads";
        $query = $this->db->insert($table_name, $data);
        if ($this->db->affected_rows() > 0) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }
	public function updateFileUploads($salient_id, $data) {
        $this->db->set($data);
        $this->db->where('id', $salient_id);
        $query1 = $this->db->update("award_recomm_contract_salient");
		
        if ($query1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
	function addNfaStatus($data) {
		$table_name = "award_recomm_contractor_status";
        $query = $this->db->insert($table_name, $data);
        if ($this->db->affected_rows() > 0) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }


	public function getPackageNameCreate($type_work_id,$project_id){
		
		$sql = "SELECT typeofwork.name as package_name,projects.project_name as project_name FROM typeofwork , projects WHERE typeofwork.id = '$type_work_id' and projects.project_id='$project_id'" ;
		$query = $this->db->query($sql);				
        $data = $query->result();
		return $data;
    
	}
	public function getPackageName($param) {
		$mSessionKey = $this->session->userdata('session_id');
		$this->db->select('AWDContractSalient.*,AWDTypeofwork.name as package_name,AWDProjects.project_name as project_name');
		$this->db->from('award_recomm_contract_salient AWDContractSalient');		
		$this->db->join('typeofwork AWDTypeofwork', 'AWDTypeofwork.id = AWDContractSalient.type_work_id','inner');
		$this->db->join('projects AWDProjects', 'AWDProjects.project_id = AWDContractSalient.project_id','inner');

		$this->db->where(array('AWDContractSalient.id'=> $param));

		$mQuery_Res = $this->db->get();
		
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
    public function getAllParent() {
		$mSessionKey = $this->session->userdata('session_id');
		$tbl = "award_recomm_contract_salient AWDContractSalient ";
		
		$data = "AWDContractSalient.*,AWDProjects.project_name as project_name,AWDTypeofwork.name as package_name,AWDSynopsLbl.synopsis_label as synopsis_label";
		
		$joins[]=array("table"=>"award_recomm_contract_synopsis_label AWDSynopsLbl ","condition"=>"AWDSynopsLbl.salient_id = AWDContractSalient.id","type"=>'inner');
		$this->db->join('typeofwork AWDTypeofwork', 'AWDTypeofwork.id = AWDContractSalient.type_work_id','inner');
		$joins[]=array("table"=>"projects AWDProjects ","condition"=>"AWDProjects.project_id = AWDContractSalient.project_id","type"=>'inner');

		$where = array('initiated_by'=>$mSessionKey,'status'=>'0','nfa_status!='=>'C');
		$or_where = array("nfa_status"=>'RT');
		$group_by = "AWDContractSalient.id";
		$order_by='id DESC';
		$data = $this->common->select_fields_or_where_join($tbl, $data, $joins , $where, $or_where,'',$group_by,$order_by,'',true);
		
		return $data;
	
    }
	public function getContractData($awdType=null,$project_id=null,$type_work_id=null,$nfaStatus=null,$zone=null){
		
		$mSessionKey = $this->session->userdata('session_id');
		$mSessionRole = $this->session->userdata('session_role');

		$this->db->select('AWDContractSalient.*,AWDTypeofwork.name as package_name,AWDProjects.project_name as project_name,AWDSynopsLbl.synopsis_label as synopsis_label');
		
		$this->db->from('award_recomm_contract_salient AWDContractSalient');
			
		$this->db->join('award_recomm_contract_synopsis_label AWDSynopsLbl', 'AWDSynopsLbl.salient_id = AWDContractSalient.id','inner');
		$this->db->join('typeofwork AWDTypeofwork', 'AWDTypeofwork.id = AWDContractSalient.type_work_id','inner');
		$this->db->join('projects AWDProjects', 'AWDProjects.project_id = AWDContractSalient.project_id','inner');
		if($nfaStatus!="Cancelled" && $nfaStatus!="Returned")
		{
			$this->db->join('award_recomm_contractor_status AWDContractStatus', 'AWDSynopsLbl.salient_id = AWDContractStatus.salient_id','inner');
			
		}
		if($project_id)
		{
			$this->db->where(array('AWDContractSalient.project_id'=> $project_id));
		
		}
		if($type_work_id)
		{
			$this->db->where(array('AWDContractSalient.type_work_id'=> $type_work_id));
		
		}
		if($zone)
		{
			$this->db->where(array('zone'=> $zone));
			
		}
		$this->db->where(array('status !='=> 2));
		if($mSessionRole!="PCM")
        {
			$this->db->where(array('approver_id'=> $mSessionKey));
			
		}
		if($nfaStatus)
		{
			if($nfaStatus=="Approved")
				$this->db->where(array('nfa_status'=> 'A'));
			else if($nfaStatus=="Pending")
			{	
				
				$this->db->where(array('status'=> 1));
				$ignore = array('R', 'RT','A','AMD');
				$this->db->where_not_in('nfa_status', $ignore);				
				
			}
			else if($nfaStatus=="Draft")
			{
				
				$this->db->where('((status =', 0, TRUE)				
				->where("nfa_status != 'C')", NULL, TRUE)
				->or_where("(nfa_status = 'RT' and status=1))", NULL, TRUE);
				
			}
			else if($nfaStatus=="Returned")
			{
				$this->db->where(array('status'=> 1,'nfa_status'=> 'R'));
				
			}
			else if($nfaStatus=="Cancelled")
			{
				$this->db->where(array('status'=> 0,'nfa_status'=> 'C'));
				
			
			}
			else if($nfaStatus=="Amended")
			{
				$this->db->where(array('status'=> 1,'nfa_status'=> 'AMD'));
				
			
			}
		}
		else
		{
			if($mSessionRole!="PCM")
			{
				
				$this->db->where(array('status'=> 1));
				$ignore = array('R', 'RT','AMD');
				
				$this->db->where_not_in('(nfa_status', $ignore, TRUE)
				->or_where("nfa_status = 'A')", NULL, FALSE);
								
			}
		}
			
						
		$this->db->order_by('AWDContractSalient.id', 'DESC');
		$this->db->group_by('AWDContractSalient.id');
		
		$mQuery_Res = $this->db->get();
		
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

	//Get All nfa by initiator
	 public function getAllNfa() {
		$mSessionKey = $this->session->userdata('session_id');
		$tbl = "award_recomm_contract_salient AWDContractSalient ";
	
		$data = "AWDContractSalient.*,AWDSynopsLbl.synopsis_label as synopsis_label";
		
		$joins[]=array("table"=>"award_recomm_contract_synopsis_label AWDSynopsLbl ","condition"=>"AWDSynopsLbl.salient_id = AWDContractSalient.id","type"=>'inner');
	
		$where = array('initiated_by'=>$mSessionKey);
		
		$group_by = "AWDContractSalient.id";
		$order_by='id DESC';
		$data = $this->common->select_fields_where_like_join($tbl, $data, $joins , $where, $$single,'','',$group_by,$order_by,'',true);
		
		return $data;
		
    }
   

    public function getParentByKey($param) {
        $this->db->select('*');
        $this->db->from($this->table_parent);
        $this->db->where('id', $param);
       
        $data = array();
        $mQuery_Res = $this->db->get();
        if ($mQuery_Res->num_rows() > 0) {
            $data = $mQuery_Res->row_array();
            return $data;
        } else {
            return false;
        }
    }
	
	//Get Final Bidders
	public function getFinalBidders($salient_id) {		
		
		$tbl = "award_recomm_contract_final_bidders ";
		$data = "*";
		$single = FALSE;
		$group_by='';
		$where = array('salient_id'=>$salient_id);
				
		$order_by='ISNULL(bid_position) ASC, bid_position ASC ';
		
		$array = false;
		$data = $this->common->select_fields_where($tbl, $data,  $where, $single ,'','','',$group_by,$order_by,$array);
		
		return $data; 
		       
    }
	
	public function getAppointment_dates($salient_id) {
			
		$tbl = "award_recomm_contractor_appointment_dates ";
		$data = "*";
		$single = true;
		$group_by='';
		$where = array('salient_id'=>$salient_id);
				
		$order_by='id ASC';
		$array = true;
		$data = $this->common->select_fields_where($tbl, $data,  $where, $single ,'','','',$group_by,$order_by,$array);
		
		return $data;
	
    }
	
	//Major terms
	public function getMajorTerms($salient_id,$package_id=null,$term=null) {
		
		$tbl = "award_recomm_contract_packages AWDPackage ";
		$data = "*";		
		
		$joins[]=array("table"=>"award_recomm_contractor_major_terms AWDMajorTerms","condition"=>"AWDMajorTerms.salient_id = AWDPackage.salient_id and AWDMajorTerms.package_id = AWDPackage.id ","type"=>'inner');
		
		$where = array('AWDPackage.salient_id'=>$salient_id);
		if($package_id)
		{
			$where['AWDMajorTerms.package_id'] = $package_id;
			$single = TRUE;	
		}
		if($term)
		{
			$where['AWDMajorTerms.term'] = $term;
			$single = TRUE;	
		}
		else			
			$single = FALSE;			
		
		$group_by = "AWDMajorTerms.term";
	
		$order_by='AWDMajorTerms.id';
		$array = false;
		$data = $this->common->select_fields_where_like_join($tbl, $data, $joins , $where, $single,'','',$group_by,$order_by,'',$array);
		
		return $data;
	
    }
		
	//Get the  approvers conditions
	
	public function getApprover_conditions($l1_vendor1=null) {
		
        $this->db->select('ApproverCond.*');
        $this->db->from('award_recomm_contractor_approvers_conditions ApproverCond');
		$mSessionKey = $this->session->userdata('session_id');
		
        $this->db->where('condition3', $l1_vendor1);
		
        $this->db->order_by('id', 'asc');
          		
        $data = array();
        $mQuery_Res = $this->db->get();
		
        if ($mQuery_Res->num_rows() > 0) {
            $data = $mQuery_Res->result_array();
            return $data;
        } else {
            return false;
        }
    }

    public function updateParentByKey($param, $data) {
	
        $this->db->set($data);
        $this->db->where('id', $param);
        $query1 = $this->db->update($this->table_parent);
		
        if ($query1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

	
	//award synopsis Label
	public function awardSynopsLbl_updateOrInsertData($salient_id,$data) {
		$tbl = "award_recomm_contract_synopsis_label ";
		
		$where = array('salient_id'=>$salient_id);
					
		$insUpd = $this->common->updateOrInsertData($tbl,$where, $data);
		
		return $insUpd;
		
	}
	//award synopsis Data
	public function awardSynopsis_updateOrInsertData($salient_id,$data) {
		$tbl = "award_recomm_contract_synopsis ";
		
		$where = array('salient_id'=>$salient_id);
					
		$insUpd = $this->common->updateOrInsertData($tbl,$where, $data);
		
		return $insUpd;
		
	}
	//award Appointment Data
	public function awardAppointment_updateOrInsertData($salient_id,$data) {
		$tbl = "award_recomm_contractor_appointment_dates ";
		
		$where = array('salient_id'=>$salient_id);
					
		$insUpd = $this->common->updateOrInsertData($tbl,$where, $data);
		
		return $insUpd;
		
	}
	//award Efficiency Update
	public function awardEfficiency_updateOrInsertData($salient_id,$data) {
		$tbl = "award_recomm_contractor_award_efficiency";
		
		$where = array('salient_id'=>$salient_id);
					
		$insUpd = $this->common->updateOrInsertData($tbl,$where, $data);
	
		return $insUpd;
		
	}
	//FinalBid Update
	public function awardFinalBid_updateOrInsertData($salient_id,$data) {
		$tbl = "award_recomm_contract_final_bid";
		$where = array('salient_id'=>$salient_id);
					
		$insUpd = $this->common->updateOrInsertData($tbl,$where, $data);
		
		return $insUpd;
		
	}
	//Insert NFA Logs
	public function nfaLogs_insertData($salient_id,$data) {
		$tbl = "award_recomm_contractor_nfa_logs";
			
		$ins = $this->common->insert_record($tbl,$data);
		
		return $ins;
		
	}
	
	//Check Packages exist and delete
	public function checkPackageDelete($salient_id) {
		$tbl = "award_recomm_contract_packages";
		$where = array('salient_id'=>$salient_id);
					
		$isExist = $this->common->get_row_where($tbl,$where);
		if($isExist)
			$delData = $this->common->delete_data($tbl,$where);
		
		return $isExist;
		
	}
   
	//Check Synpsis Packages exist and delete
	public function checkSynopsPackageDelete($salient_id) {
		$tbl = "award_recomm_contract_synopsis_packages";
		$where = array('salient_id'=>$salient_id);
					
		$isExist = $this->common->get_row_where($tbl,$where);
		if($isExist)
			$delData = $this->common->delete_data($tbl,$where);
				
		return $isExist;
		
	}
	//Check Bidders exist and delete
	public function checkBiddersDelete($salient_id) {
		$tbl = "award_recomm_contract_final_bidders";
		$where = array('salient_id'=>$salient_id);
					
		$isExist = $this->common->get_row_where($tbl,$where);
		if($isExist)
			$delData = $this->common->delete_data($tbl,$where);
				
		return $isExist;
		
	}
   
	//Check Final bid Scenario exist and delete
	public function checkFinalBidDelete($salient_id) {
		$tbl = "award_recomm_contract_final_bid_scenario";
		$where = array('salient_id'=>$salient_id);
					
		$isExist = $this->common->get_row_where($tbl,$where);
		if($isExist)
			$delData = $this->common->delete_data($tbl,$where);
		
		return $isExist;
		
	}		
	//Check Major terms exist and delete
	public function checkMajorTermsDelete($salient_id) {
		$tbl = "award_recomm_contractor_major_terms";
		$where = array('salient_id'=>$salient_id);
					
		$isExist = $this->common->get_row_where($tbl,$where);
		if($isExist)
			$delData = $this->common->delete_data($tbl,$where);
		
		return $isExist;
		
	}
   
	public function get_users($role) {
		
		$sql = "SELECT buyer_id,buyer_name FROM buyers WHERE buyer_role='$role' ";
		
        $query = $this->db->query($sql);
        $res = $query->result();
		
        return $res;
    }
	//Get award contract package data
	public function get_award_contract_package_data($salient_id) {
		
		$tbl = "award_recomm_contract_packages AWDPackage ";
		$data = "*";
		
		
		$joins[]=array("table"=>"award_recomm_contract_synopsis_packages AWDSynopsPkg","condition"=>"AWDSynopsPkg.salient_id = AWDPackage.salient_id and AWDSynopsPkg.package_id = AWDPackage.id","type"=>'inner');
		
		$where = array('AWDPackage.salient_id'=>$salient_id);
		$single = false;
		$group_by = "AWDPackage.id";
		
		$order_by='AWDSynopsPkg.finalized_award_value_package asc';
		
		$data = $this->common->select_fields_where_like_join($tbl, $data, $joins , $where, $single,'','',$group_by,$order_by,'',true);
		
		return $data;
		
    }
	
	//Get award contract Final Bid data
	public function get_award_contract_FinalBid($salient_id,$package_id=null,$bidder_id=null) {
		$tbl = "award_recomm_contract_final_bid_scenario ";
		$data = "*";
		$where = array('salient_id'=>$salient_id,'package_id'=>$package_id);
		if($bidder_id)
			$where['bidder_id'] = $bidder_id;
		$single = true;
		
		$records = $this->common->select_fields_where($tbl, $data, $where, $single);
		
		return $records;
		
		
    }
	//Get award contract data
	public function get_award_contract_data($salient_id) {
		
		$tbl = "award_recomm_contract_synopsis_label AWDSynopsLbl ";
		$data = "*";
		
		$joins[]=array("table"=>"award_recomm_contract_final_bidders AWDFinalBid","condition"=>"AWDFinalBid.salient_id = AWDSynopsLbl.salient_id","type"=>'inner');
		
		$joins[]=array("table"=>"award_recomm_contractor_award_efficiency AWDEfficiency","condition"=>"AWDEfficiency.salient_id = AWDSynopsLbl.salient_id","type"=>'inner');
		$where = array('AWDSynopsLbl.salient_id'=>$salient_id);
		$single = true;
		$group_by = "";
		$order_by='';
	
		$data = $this->common->select_fields_where_like_join($tbl, $data, $joins , $where, $single,'','',$group_by,$order_by,'',true);
		
		return $data;
		
		
    }
	//Select minimum bidder value for package
	
	public function get_min_bidder_data($salient_id=null,$package_id=null) {
		
		
		$tbl = "award_recomm_contract_final_bid_scenario";
		$data = "*";
		
		$where = array('salient_id'=>$salient_id,'package_id'=>$package_id);
		$this->db->select_min('package_bidder');
		$this->db->where($where);
		
		$query = $this->db->get($tbl); 
		$res = $query->result();
		
        return $res;
		
    }
	
	public function get_level_approvers($salient_id) {
		
		$tbl = "award_recomm_contractor_status AWDContractStatus ";
		$data = "AWDContractStatus.*,buyers.buyer_name";
		
		$joins[]=array("table"=>"buyers ","condition"=>"buyers.buyer_id = AWDContractStatus.approver_id","type"=>'inner');
		
		$where = array('AWDContractStatus.salient_id'=>$salient_id);
		$single = false;
		$group_by = "";
		$order_by='approver_level asc';
		
		$data = $this->common->select_fields_where_like_join($tbl, $data, $joins , $where, $single,'','',$group_by,$order_by,'',true);
		
		return $data;
		
    }
	public function checkApproverDelete($salient_id) {
        $this->db->select('salient_id');
        $this->db->from("award_recomm_contractor_status");
        $this->db->where('salient_id', $salient_id);
       
        $data = array();
        $mQuery_Res = $this->db->get();
		
        if ($mQuery_Res->num_rows() > 0) {
			
            $del = $this->deleteApprovers($salient_id);
            return $del;
        } else {
            return false;
        }
    }
	public function deleteApprovers($salient_id) {
        $this->db->where('salient_id', $salient_id);
        $mDelete = $this->db->delete("award_recomm_contractor_status");
		
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

	public function getReturnedNfa() {
		
        $this->db->select('LDWSalient.*');
        $this->db->from('ld_waiver_salient LDWSalient');
		$mSessionKey = $this->session->userdata('session_id');
		        
		$this->db->where('initiated_by', $mSessionKey,FALSE);
        $this->db->where('status', 1,FALSE);
		$this->db->where("nfa_status", "'R'", FALSE);
        $this->db->order_by('id', 'DESC');
      
        $this->db->order_by('LDWSalient.id', 'DESC');
		
        $data = array();
        $mQuery_Res = $this->db->get();
		
        if ($mQuery_Res->num_rows() > 0) {
            $data = $mQuery_Res->result_array();
            return $data;
        } else {
            return false;
        }
    }
	public function getReportData($nfaStatus=null,$buyer_id=null,$start_date=null,$end_date=null) {
		
		if($nfaStatus!="Cancelled")
		{
			$this->db->select('AWDContractSalient.*,AWDContractStatus.approver_level,approved_status, AWDSynopsLbl.synopsis_label');
			
			$this->db->from('award_recomm_contract_salient AWDContractSalient');
			
			$this->db->join('award_recomm_contractor_status AWDContractStatus', 'AWDContractStatus.salient_id = AWDContractSalient.id','inner');
			$this->db->join('award_recomm_contract_synopsis_label AWDSynopsLbl', 'AWDSynopsLbl.salient_id = AWDContractSalient.id','inner');
			
		}
		
		if($nfaStatus=="Initiated")
		{			
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
			
		}
		else if($nfaStatus=="Approved")
		{
			
			$this->db->where(array('status'=> 1,'approved_status'=> 1,'nfa_status '=> 'A','approver_id !='=> '','approver_id !='=> 0));
			if($buyer_id)
			{
				
				$this->db->where(array('approver_id '=> $buyer_id));
			}
			if($start_date)
			{
				$this->db->where(array('date(approved_date)>='=> $start_date));
			}
			if($end_date)
			{
				$this->db->where(array('date(approved_date)<='=> $end_date));
			}
		
        
		}
		else if($nfaStatus=="Returned")
		{
			
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
			$data['records'] = $this->nfaAction->getNfaData($param,"award_contract");
			
			return $data['records'];
			
		}
		$this->db->order_by('AWDContractSalient.id', 'DESC');
		$this->db->group_by('AWDContractSalient.id');
		
		$mQuery_Res = $this->db->get();
		
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
	
	//Get Level with Roles
	
	public function getAllLevelRole($param=null) {
		
        $this->db->select('*');
        $this->db->from('award_recomm_contractor_role_level');
		
		$this->db->where($param);
        
        $this->db->order_by('id', 'ASC');
				
        $data = array();
        $mQuery_Res = $this->db->get();
		
        if ($mQuery_Res->num_rows() > 0) {
            $data = $mQuery_Res->result();
            return $data;
        } else {
            return false;
        }
    }
}

?>