
<!DOCTYPE html>
<html>
    <!-- Mirrored from colorlib.com/polygon/adminator/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 Dec 2018 11:29:58 GMT -->
    <!-- Added by HTTrack -->
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <!-- /Added by HTTrack -->

    <head>
        <title> IKANEKT R&D </title>
        <!-- External -->
        <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


        <!-- Stepper CSS -->
        <link href="css/addons-pro/steppers.css" rel="stylesheet">
        <!-- Stepper CSS - minified-->
        <link href="css/addons-pro/steppers.min.css" rel="stylesheet">

        <!-- Stepper JavaScript -->
        <script type="text/javascript" src="js/addons-pro/stepper.js"></script>
        <!-- Stepper JavaScript - minified -->
        <script type="text/javascript" src="js/addons-pro/stepper.min.js"></script>
        <!-- Data Tables -->
        <link rel="stylesheet" href="https://ikanektrnd.com/adichunchanagiri/assets/plugins/datatables/dataTables.bootstrap.css">
        <!--<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>-->
        <!--<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>-->



        <style>
            .main-content{
                position: absolute !important;
                height: auto !important;
                right:10px;
            }
            #loader {
                transition: all .3s ease-in-out;
                opacity: 1;
                visibility: visible;
                position: fixed;
                height: 100vh;
                width: 100%;
                background: #fff;
                z-index: 90000
            }

            #loader.fadeOut {
                opacity: 0;
                visibility: hidden
            }

            .spinner {
                width: 40px;
                height: 40px;
                position: absolute;
                top: calc(50% - 20px);
                left: calc(50% - 20px);
                background-color: #333;
                border-radius: 100%;
                -webkit-animation: sk-scaleout 1s infinite ease-in-out;
                animation: sk-scaleout 1s infinite ease-in-out
            }

            @-webkit-keyframes sk-scaleout {
                0% {
                    -webkit-transform: scale(0)
                }
                100% {
                    -webkit-transform: scale(1);
                    opacity: 0
                }
            }

            @keyframes sk-scaleout {
                0% {
                    -webkit-transform: scale(0);
                    transform: scale(0)
                }
                100% {
                    -webkit-transform: scale(1);
                    transform: scale(1);
                    opacity: 0
                }
            }

            .nav-item mT-30 active {
                border:2px solid red;
            }

            .fsz-lg > li > a:hover {
                background-color:#deecf9 !important;
            }

            .sidebar-menu > li > a {
                color:silver !important;
            }

            .sidebar-menu > li > a:hover {
                color:#fff !important;
            }

            .sidebar-menu > li:hover {
                background-color:#293C4F !important;
                color:#fff !important;
            }

            .sidebar-menu > li.active {
                background-color:#000072 !important;
            }

            .bdrs-50p {
                border-radius:50px;
                border:2px solid #e0f0ff;
            }

            #titlediv {
                border-bottom:2px solid #e2e2e2;
                padding:0px;
                background-color:#dbebff;
            }

            .loggeddiv:hover {
                background-color:#DBEBFF;
            }
            @media screen and (max-width: 991px){
                .sidebar {
                    left: 0px !important;
                }
                .is-collapsed .sidebar {
                    left: -280px !important;
                }
                .main-content{
                    left:10px;
                }
            }
            @media screen and (min-width: 992px){
                .main-content{
                    left:290px;
                }
            }

            .home-button:hover {
                background-color:#010038 !important;
                border:2px solid #2AACED;
                cursor:pointer !important;
            }
            #header-brand-li > a:hover {
                background-color:#0000bc !important;
                color:grey !important;
            }

            .dataTables_length > label > .input-sm {
                height: 35px !important;
            }
        </style>
        <link href="https://ikanektrnd.com/adichunchanagiri/css/style.css" rel="stylesheet">
    </head>

    <body class="app is-collapsed">


        <div id="loader">
            <div class="spinner"></div>
        </div>
        <script type="text/javascript">
            window.addEventListener('load', () => {
                const loader = document.getElementById('loader');
                setTimeout(() => {
                    loader.classList.add('fadeOut');
                }, 300);
            });
        </script>
        <div>
            <div class="sidebar" style="background-color:#10253F;">
                <div class="sidebar-inner">
                    <div class="sidebar-logo" style="height:118px; background-color:#10253F; border-bottom:2px solid #142f51; border-right:2px solid #142f51;">
                        <div class="peers ai-c fxw-nw">
                            <div class="peer peer-greed">
                                <a class="sidebar-link td-n" href="https://ikanektrnd.com/adichunchanagiri/admin/dashboard" class="td-n">
                                    <div class="peers ai-c fxw-nw">

                                        <center><img src="https://ikanektrnd.com/adichunchanagiri/assets/images/ikanekt_logo.png" alt="" style="width:100%; height:90px;"></center>

                                        <!--<div class="peer">-->
                                        <!--    <div class="logo"><img src="https://ikanektrnd.com/adichunchanagiri/assets/images/Logo_1.png" alt="" style="width:90%;padding-left:40%;padding-top:20%;"></div>-->
                                        <!--</div>-->
                                        <!--<div class="peer peer-greed">-->
                                        <!--    <h1 class="lh-1 mB-0 logo-text" style="margin-top:17px;"><i style="color:#AADAFF;text-shadow:2px 2px 2px grey;">IKANEKT R&D</i></h1>-->
                                        <!--</div>-->
                                    </div>
                                </a>
                            </div>
                            <div class="peer">
                                <div class="mobile-toggle sidebar-toggle"><a href="#" class="td-n"><i class="ti-arrow-circle-left"></i></a></div>
                            </div>
                        </div>
                    </div>





                    <ul class="sidebar-menu scrollable pos-r">

                        <li class="nav-item"><a class="sidebar-link" href="https://ikanektrnd.com/adichunchanagiri/admin/dashboard" default><span class="icon-holder"><i class="c-purple-500 ti-home"></i> </span><span class="title">Home</span></a></li>



                        <!-- ****************************************************** Main Modules ************************************************************* -->


                        <li class="nav-item "><a class="sidebar-link" href="https://ikanektrnd.com/adichunchanagiri/admin/activity_management" default><span class="icon-holder"><i class="c-pink-500 ti-write"></i> </span><span class="title">Activity Management</span></a></li>

                        <li class="nav-item "><a class="sidebar-link" href="https://ikanektrnd.com/adichunchanagiri/admin/study_management" default><span class="icon-holder"><i class="c-purple-500 ti-agenda"></i> </span><span class="title">Study Management</span></a></li>

                        <li class="nav-item "><a class="sidebar-link" href="https://ikanektrnd.com/adichunchanagiri/admin/ethics_committee" default><span class="icon-holder"><i class="c-light-blue-500 ti-calendar"></i> </span><span class="title">Ethics Committee</span></a></li>




                        <!-- ****************************************************** Ethics Committee ************************************************************* -->













                        <!-- *********************************************************** Study Management ************************************************************* -->


                        <br><br><br>

                    </ul>


                </div>
            </div>
            <div class="page-container">
                <div class="header navbar" style="border:2px solid #10253F; border-radius:0px;">
                    <div class="header-container" style="background-color:#10253F; color:#fff;">
                        <ul class="nav-left">
                            <li><a id="sidebar-toggle" class="sidebar-toggle sidebar-toggle-open" href="javascript:void(0);"><i class="ti-menu"></i></a></li>
                            <li><a id="sidebar-toggle" class="sidebar-toggle sidebar-toggle-close" href="javascript:void(0);"><i class="ti-close" style="color:#fff;"></i></a></li>
                            <!--li class="search-box"><a class="search-toggle no-pdd-right" href="javascript:void(0);"><i class="search-icon ti-search pdd-right-10"></i> <i class="search-icon-close ti-close pdd-right-10"></i></a></li>
                            <li class="search-input">
                                <input class="form-control" type="text" placeholder="Search...">
                            </li-->
                        </ul>
                        <ul class="nav-right pull-right">

                            <li id="notificationsviewbutt" class="notifications dropdown show">

                                <span class="counter bgc-red">2</span> 
                                <a href="#" class="dropdown-toggle no-after" data-toggle="dropdown"><i class="ti-bell" style="color:#fff;"></i></a>

                                <ul class="dropdown-menu">
                                    <li class="pX-20 pY-15 bdB"><i class="ti-bell pR-10" style="font-size:22px;"></i> <span class="fsz-lg fw-600 c-grey-900">Notifications</span></li>
                                    <li>
                                        <ul class="ovY-a pos-r scrollable lis-n p-0 m-0 fsz-md">
                                            <li>
                                                <a href="https://ikanektrnd.com/adichunchanagiri/admin/profile" class="peers fxw-nw td-n p-20 bdB c-grey-800 cH-blue bgcH-grey-100">
                                                    <div class="peer mR-15"><img class="w-3r bdrs-50p" src="https://ikanektrnd.com/adichunchanagiri/assets/images/men/1.jpg" alt=""></div>
                                                    <div class="peer peer-greed">
                                                        <span>
                                                            <span class="c-grey-600">Your MRC certificate has expired on </span> <span class="fw-500">2021-07-14.<br> </span><span class="c-grey-600">Upload new MRC</span>
                                                        </span>
                                                    </div>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="https://ikanektrnd.com/adichunchanagiri/admin/profile" class="peers fxw-nw td-n p-20 bdB c-grey-800 cH-blue bgcH-grey-100">
                                                    <div class="peer mR-15"><img class="w-3r bdrs-50p" src="https://ikanektrnd.com/adichunchanagiri/assets/images/men/1.jpg" alt=""></div>
                                                    <div class="peer peer-greed">
                                                        <span>
                                                            <span class="c-grey-600">Your GCP certificate has expired on </span> <span class="fw-500">2021-07-14.<br> </span><span class="c-grey-600">Upload new GCP</span>
                                                        </span>
                                                    </div>
                                                </a>
                                            </li>

                                        </ul>
                                    </li>
                                </ul>
                            </li>

<!--li class="notifications dropdown"><span class="counter bgc-blue">3</span> <a href="#" class="dropdown-toggle no-after" data-toggle="dropdown"><i class="ti-bell" style="color:#fff;"></i></a>
    <ul class="dropdown-menu">
        <li class="pX-20 pY-15 bdB"><i class="ti-email pR-10"></i> <span class="fsz-md fw-600 c-grey-900">Notifications</span></li>
        <li>
            <ul class="ovY-a pos-r scrollable lis-n p-0 m-0 fsz-sm">
                <li>
                    <a href="#" class="peers fxw-nw td-n p-20 bdB c-grey-800 cH-blue bgcH-grey-100">
                        <div class="peer mR-15"><img class="w-3r bdrs-50p" src="https://ikanektrnd.com/adichunchanagiri/assets/images/men/1.jpg" alt=""></div>
                        <div class="peer peer-greed">
                            <div>
                                <div class="peers jc-sb fxw-nw mB-5">
                                    <div class="peer">
                                        <p class="fw-500 mB-0">John Doe</p>
                                    </div>
                                    <div class="peer"><small class="fsz-xs">5 mins ago</small></div>
                                </div><span class="c-grey-600 fsz-sm">Want to create your own customized data generator for your app...</span></div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#" class="peers fxw-nw td-n p-20 bdB c-grey-800 cH-blue bgcH-grey-100">
                        <div class="peer mR-15"><img class="w-3r bdrs-50p" src="https://ikanektrnd.com/adichunchanagiri/assets/images/men/2.jpg" alt=""></div>
                        <div class="peer peer-greed">
                            <div>
                                <div class="peers jc-sb fxw-nw mB-5">
                                    <div class="peer">
                                        <p class="fw-500 mB-0">Moo Doe</p>
                                    </div>
                                    <div class="peer"><small class="fsz-xs">15 mins ago</small></div>
                                </div><span class="c-grey-600 fsz-sm">Want to create your own customized data generator for your app...</span></div>
                        </div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="pX-20 pY-15 ta-c bdT"><span><a href="#" class="c-grey-600 cH-blue fsz-sm td-n">View All Email <i class="fs-xs ti-angle-right mL-10"></i></a></span></li>
    </ul>
</li-->
                            <li class="dropdown" id="header-brand-li">
                                <a href="#" class="dropdown-toggle no-after peers fxw-nw ai-c lh-1 loggeddiv" data-toggle="dropdown">

                                    <div class="peer mR-11"><img class="w-5r bdrs-50p" src="https://ikanektrnd.com/adichunchanagiri/assets/images/users/male_user_icon.png" alt="" style="background-color:#fcfcfc;"></div>

                                    <div class="peer"><span class="fsz-lg c-grey-700"><b style="color:#fff;"> &nbsp Srirang Ramamoorthy </b></span></div>
                                </a>
                                <ul class="dropdown-menu fsz-lg">
                                    <li><a href="https://ikanektrnd.com/adichunchanagiri/admin/profile" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700"><i class="ti-user mR-10"></i> <span>Profile</span></a></li>
                                    <!--<li><a href="#" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700"><i class="ti-settings mR-10"></i> <span>Settings</span></a></li>-->
                                    <li role="separator" class="divider"></li>
                                    <li><a href="https://ikanektrnd.com/adichunchanagiri/logout" class="d-b td-n pY-5 bgcH-grey-100 c-red-700"><i class="ti-power-off mR-10"></i> <span>Logout</span></a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div id="titlediv" style="background-color:#10253F; padding:7px; margin-left:-5px; margin-top:-5px;">
                        <h1 style="color:silver;font-size:25px;"> &nbsp &nbspAdd Study Proposal <span style="color:#e2e2e2;font-size:15px;"></span>
                            <!--span class="pull-right" style="padding-right:1.5%;font-size:17px;color:#e2e2e2;padding-top:10px;"> &nbsp Welcome 
                            <b>
                                <i style="color:#fff;">
                                    Sponsor                        </i>
                            </b> &nbsp
                            </span-->
                        </h1>
                    </div>
                </div>
                <main class="main-content bgc-grey-100"><br><br>
                    <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
                    <script type="text/javascript" src="https://ikanektrnd.com/adichunchanagiri/assets/plugins/htmltopdf/js/jquery/jquery-1.7.1.min.js"></script>
                    <script type="text/javascript" src="https://ikanektrnd.com/adichunchanagiri/assets/plugins/htmltopdf/js/jquery/jquery-ui-1.8.17.custom.min.js"></script>
                    <script type="text/javascript" src="https://ikanektrnd.com/adichunchanagiri/assets/plugins/htmltopdf/dist/jspdf.debug.js"></script>
                    <script type="text/javascript" src="https://ikanektrnd.com/adichunchanagiri/assets/plugins/htmltopdf/js/basic.js"></script>
                    <!-- pdfviewer -->
                    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/1.8.349/pdf.min.js"></script>
                    <!-- Select2 -->
                    <link href="https://ikanektrnd.com/adichunchanagiri/assets/plugins/select2/select2.css" rel="stylesheet"/>
                    <script src="https://ikanektrnd.com/adichunchanagiri/assets/plugins/select2/select2.js"></script>

                    <style>
                        input, select, textarea {
                            font-size:13px !important;
                        }
                        .red {
                            color:red;
                        }
                        #docpreviews > div {
                            border:2px solid #DBEBFF;
                        }

                        .modal-backdrop {
                            display: none !important;
                        }
                        select {
                            height:34px !important;
                        }

                        th {
                            background-color: #F9FAFB;
                        }
                    </style>


                    <!--*****************************************************************-->

                    <div id="mainContent">
                        <div class="bgc-white bd bdrs-3 p-20 mB-20" style="width: 100%;">
                            <h2 style="position:relative;">
                                <b style="color:grey;">New Study Details : </b>

                            </h2><br>

                            <div style="overflow-x:scrol;">
                                <form id="studyaddformid" name="studyaddform" action="https://ikanektrnd.com/adichunchanagiri/admin/ethics_committee/sponsor_study_proposal_save" method="post" role="form" autocomplete="off" onsubmit="return  validate_unique_data()" enctype="multipart/form-data" style="border:1px solid #e2e2e2; padding:3px; border-radius:5px;">
                                    <table class="table table-stripe table-bordered" cellspacing="0">
                                        <tr class="theadtr theadtr1">
                                            <th style="display:none;">EC Meeting Date</th>
                                            <th>Study Title</th>
                                            <th class="text-center">Protocol Number</th>
                                        </tr>
                                        <tr>
                                            <td style="display:none;">
                                                <select id="meetingdate" name="meetingdate" class="form-control"  style="height:38px;" required>
                                                    <option value="0"> Select Date </option>
                                                    <option value="2022-03-09"> 2022-03-09 ( mec ) </option>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" maxlength="100" id="studytitle" name="studytitle" class="form-control" placeholder="Enter Study Title" onkeyup="return validate_title()" required >
                                                <input type="hidden" name="study_title_valid_status" id="study_title_valid_status" value="0" required />
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="protocolnumber" id="protocolnumber" value="" placeholder="Enter protocol Number" onkeyup="return validate_protocol()" required>
                                                <input type="hidden" name="protocol_number_valid_status" id="protocol_number_valid_status" value="0" required />
                                            </td>
                                        </tr>
                                    </table>

                                    <table class="table table-stripe table-bordered" cellspacing="0">
                                        <tr class="theadtr theadtr1">
                                            <th class="text-center">Target Recruitment</th>
                                            <th style="display:none;">Sponsor</th>
                                            <th style="display:none;">Investigator</th>
                                            <th>Research Manager</th>
                                            <th>Study Documents</th>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="number" class="form-control" name="targetrecruitment" id="targetrecruitment" value="0" placeholder="Enter number of target recruitment">
                                            </td>
                                            <td style="display:none;">
                                                <input type="text" name="sponsor" class="form-control" placeholder="Enter sponsor name" value="Srirang Ramamoorthy" readonly required>
                                            </td>
                                            <td style="display:none;">
                                                <select id="investigator" name="investigator" class="form-control"  style="height:32px;">
                                                    <option value="0"> select Investigator </option>
                                                    <option value="139"> Investigator (Demo) </option>
                                                </select>
                                            </td>
                                            <td>
                                                <select id="researchmanager" name="researchmanager" class="form-control"  style="height:32px;">
                                                    <option value="0"> select Research Manager </option>
                                                    <option value="136"> Research Manager(Demo) </option>
                                                    <option value="142"> Test Fname Test Lname </option>
                                                </select>
                                            </td>
                                            <td class="text-center">
                                                <span id="AddMoreDocumentsBtn" class="btn btn-info" data-toggle="modal" data-target="#AddMoreDocumentsModal" style="font-size: 13px;"> Upload Documents </span>
                                                <input type="hidden" id="toggle_status" value="0">

                                                <script>

                                                    $("#AddMoreDocumentsBtn").click(function () {
                                                        var toggle_status = $("#toggle_status").val();

                                                        if (toggle_status == 1) {
                                                            $("#toggle_status").val('0');
                                                            $("#upload_doc_toggle").hide(700);
                                                        } else {
                                                            $("#toggle_status").val('1');
                                                            $("#upload_doc_toggle").show(700);
                                                        }

                                                    });
                                                </script>
                                            </td>
                                        </tr>
                                    </table>

                                    <div id="upload_doc_toggle" style="display:none;">
                                        <table class="table table-stripe table-bordere" id="additionaldocstbl" cellspacing="0" style="width:90%; margin-left:5%;">

                                            <thead>
                                                <tr>
                                                    <th>Sl.no</th>
                                                    <th style="width:23%;">Type of Document</th>
                                                    <th>Validity</th>
                                                    <th class="text-center">Validity Period</th>
                                                    <th class="text-center">Applicable for Study</th>
                                                    <th class="text-center">Available for upload</th>
                                                    <th>Upload Document</th>
                                                </tr>
                                                <tr>
                                                    <td>1. </td>
                                                    <td><input type="text" class="form-control" name="study_doc_name_1" value="Protocol" readonly required></td>
                                                    <td class="text-center"><input type="checkbox" id="validity_check_1" name="validity_check_1" value="Yes" onclick="return validity_check_click(1)" /></td>
                                                    <td class="text-center">
                                                        <span id="validity_input_1" style="display:none;">
                                                            <input type="text" name="validity_from_1" placeholder="Validity From" class="form-control" onclick="(this.type = 'date')" /> 
                                                            <input type="text" name="validity_to_1" placeholder="Validity To" class="form-control" onclick="(this.type = 'date')" />
                                                        </span>
                                                        <span id="validity_span_1"><i>n/a</i></span>
                                                    </td>
                                                    <td class="text-center"><input type="checkbox" name="applicable_for_study_check_1" value="Yes" checked /></td>
                                                    <td class="text-center"><input type="checkbox" id="file_check_1" name="available_for_upload_check_1" value="Yes" onclick="return file_check_click(1)" /></td>
                                                    <td>
                                                        <span id="file_input_1" style="display:none;"><input type="file" class="form-control" name="study_doc_file_1" accept="application/pdf" /></span>
                                                        <span id="file_span_1"><i>n/a</i></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>2. </td>
                                                    <td><textarea rows="3" type="text" class="form-control" name="study_doc_name_2" value="" readonly required>Informed Consent Form / Patient Information Sheet</textarea></td>
                                                    <td class="text-center"><input type="checkbox" id="validity_check_2" name="validity_check_2" value="Yes" onclick="return validity_check_click(2)" /></td>
                                                    <td class="text-center">
                                                        <span id="validity_input_2" style="display:none;">
                                                            <input type="text" name="validity_from_2" placeholder="Validity From" class="form-control" onclick="(this.type = 'date')" /> 
                                                            <input type="text" name="validity_to_2" placeholder="Validity To" class="form-control" onclick="(this.type = 'date')" />
                                                        </span>
                                                        <span id="validity_span_2"><i>n/a</i></span>
                                                    </td>
                                                    <td class="text-center"><input type="checkbox" name="applicable_for_study_check_2" value="Yes" checked /></td>
                                                    <td class="text-center"><input type="checkbox" id="file_check_2" name="available_for_upload_check_2" value="Yes" onclick="return file_check_click(2)" /></td>
                                                    <td>
                                                        <span id="file_input_2" style="display:none;"><input type="file" class="form-control" name="study_doc_file_2" accept="application/pdf" /></span>
                                                        <span id="file_span_2"><i>n/a</i></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>3. </td>
                                                    <td><input type="text" class="form-control" name="study_doc_name_3" value="Case Report Form" readonly required></td>
                                                    <td class="text-center"><input type="checkbox" id="validity_check_3" name="validity_check_3" value="Yes" onclick="return validity_check_click(3)" /></td>
                                                    <td class="text-center">
                                                        <span id="validity_input_3" style="display:none;">
                                                            <input type="text" name="validity_from_3" placeholder="Validity From" class="form-control" onclick="(this.type = 'date')" /> 
                                                            <input type="text" name="validity_to_3" placeholder="Validity To" class="form-control" onclick="(this.type = 'date')" />
                                                        </span>
                                                        <span id="validity_span_3"><i>n/a</i></span>
                                                    </td>
                                                    <td class="text-center"><input type="checkbox" name="applicable_for_study_check_3" value="Yes" checked /></td>
                                                    <td class="text-center"><input type="checkbox" id="file_check_3" name="available_for_upload_check_3" value="Yes" onclick="return file_check_click(3)" /></td>
                                                    <td>
                                                        <span id="file_input_3" style="display:none;"><input type="file" class="form-control" name="study_doc_file_3" accept="application/pdf" /></span>
                                                        <span id="file_span_3"><i>n/a</i></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>4. </td>
                                                    <td><input type="text" class="form-control" name="study_doc_name_4" value="Insurance" readonly required></td>
                                                    <td class="text-center"><input type="checkbox" id="validity_check_4" name="validity_check_4" value="Yes" onclick="return validity_check_click(4)" /></td>
                                                    <td class="text-center">
                                                        <span id="validity_input_4" style="display:none;">
                                                            <input type="text" name="validity_from_4" placeholder="Validity From" class="form-control" onclick="(this.type = 'date')" /> 
                                                            <input type="text" name="validity_to_4" placeholder="Validity To" class="form-control" onclick="(this.type = 'date')" />
                                                        </span>
                                                        <span id="validity_span_4"><i>n/a</i></span>
                                                    </td>
                                                    <td class="text-center"><input type="checkbox" name="applicable_for_study_check_4" value="Yes" checked /></td>
                                                    <td class="text-center"><input type="checkbox" id="file_check_4" name="available_for_upload_check_4" value="Yes" onclick="return file_check_click(4)" /></td>
                                                    <td>
                                                        <span id="file_input_4" style="display:none;"><input type="file" class="form-control" name="study_doc_file_4" accept="application/pdf" /></span>
                                                        <span id="file_span_4"><i>n/a</i></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>5. </td>
                                                    <td><input type="text" class="form-control" name="study_doc_name_5" value="Clinical Trial Agreement" readonly required></td>
                                                    <td class="text-center"><input type="checkbox" id="validity_check_5" name="validity_check_5" value="Yes" onclick="return validity_check_click(5)" /></td>
                                                    <td class="text-center">
                                                        <span id="validity_input_5" style="display:none;">
                                                            <input type="text" name="validity_from_5" placeholder="Validity From" class="form-control" onclick="(this.type = 'date')" /> 
                                                            <input type="text" name="validity_to_5" placeholder="Validity To" class="form-control" onclick="(this.type = 'date')" />
                                                        </span>
                                                        <span id="validity_span_5"><i>n/a</i></span>
                                                    </td>
                                                    <td class="text-center"><input type="checkbox" name="applicable_for_study_check_5" value="Yes" checked /></td>
                                                    <td class="text-center"><input type="checkbox" id="file_check_5" name="available_for_upload_check_5" value="Yes" onclick="return file_check_click(5)" /></td>
                                                    <td>
                                                        <span id="file_input_5" style="display:none;"><input type="file" class="form-control" name="study_doc_file_5" accept="application/pdf" /></span>
                                                        <span id="file_span_5"><i>n/a</i></span>
                                                    </td>
                                                </tr>
                                                <tr style="display:none;">
                                                    <td>6. </td>
                                                    <td><input type="text" class="form-control" name="study_doc_name_6" value="Submission Letter" readonly required></td>
                                                    <td class="text-center"><input type="checkbox" id="validity_check_6" name="validity_check_6" value="Yes" onclick="return validity_check_click(6)" /></td>
                                                    <td class="text-center">
                                                        <span id="validity_input_6" style="display:none;">
                                                            <input type="text" name="validity_from_6" placeholder="Validity From" class="form-control" onclick="(this.type = 'date')" /> 
                                                            <input type="text" name="validity_to_6" placeholder="Validity To" class="form-control" onclick="(this.type = 'date')" />
                                                        </span>
                                                        <span id="validity_span_6"><i>n/a</i></span>
                                                    </td>
                                                    <td class="text-center"><input type="checkbox" name="applicable_for_study_check_6" value="Yes" checked /></td>
                                                    <td class="text-center"><input type="checkbox" id="file_check_6" name="available_for_upload_check_6" value="Yes" onclick="return file_check_click(6)" /></td>
                                                    <td>
                                                        <span id="file_input_6" style="display:none;"><input type="file" class="form-control" name="study_doc_file_6" accept="application/pdf" /></span>
                                                        <span id="file_span_6"><i>n/a</i></span>
                                                    </td>
                                                </tr>
                                                <tr style="display:none;">
                                                    <td>7. </td>
                                                    <td><input type="text" class="form-control" name="study_doc_name_7" value="Investigator Undertaking" readonly required></td>
                                                    <td class="text-center"><input type="checkbox" id="validity_check_7" name="validity_check_7" value="Yes" onclick="return validity_check_click(7)"/></td>
                                                    <td class="text-center">
                                                        <span id="validity_input_7" style="display:none;">
                                                            <input type="text" name="validity_from_7" placeholder="Validity From" class="form-control" onclick="(this.type = 'date')" /> 
                                                            <input type="text" name="validity_to_7" placeholder="Validity To" class="form-control" onclick="(this.type = 'date')" />
                                                        </span>
                                                        <span id="validity_span_7"><i>n/a</i></span>
                                                    </td>
                                                    <td class="text-center"><input type="checkbox" name="applicable_for_study_check_7" value="Yes" checked /></td>
                                                    <td class="text-center"><input type="checkbox" id="file_check_7" name="available_for_upload_check_7" value="Yes" onclick="return file_check_click(7)" /></td>
                                                    <td>
                                                        <span id="file_input_7" style="display:none;"><input type="file" class="form-control" name="study_doc_file_7" accept="application/pdf" /></span>
                                                        <span id="file_span_7"><i>n/a</i></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>8. </td>
                                                    <td><input type="text" class="form-control" name="study_doc_name_8" value="Other Documents" readonly required></td>
                                                    <td class="text-center"><input type="checkbox" id="validity_check_8" name="validity_check_8" value="Yes" onclick="return validity_check_click(8)" style="display:none;"/><span><i>n/a</i></span></td>
                                                    <td class="text-center">
                                                        <span id="validity_input_8" style="display:none;">
                                                            <input type="text" name="validity_from_8" placeholder="Validity From" class="form-control" onclick="(this.type = 'date')" /> 
                                                            <input type="text" name="validity_to_8" placeholder="Validity To" class="form-control" onclick="(this.type = 'date')" />
                                                        </span>
                                                        <span id="validity_span_8"><i>n/a</i></span>
                                                    </td>
                                                    <td class="text-center"><input type="checkbox" name="applicable_for_study_check_8" value="Yes" checked /></td>
                                                    <td class="text-center"><input type="checkbox" id="file_check_8" name="available_for_upload_check_8" value="Yes" onclick="return file_check_click(8)"/></td>
                                                    <td>
                                                        <span id="file_input_8" style="display:none;"><input type="file" class="form-control" name="study_doc_file_8[]" accept="application/pdf" multiple /></span>
                                                        <span id="file_span_8"><i>n/a</i></span>
                                                    </td>
                                                </tr>
                                            </thead>

<!--<tr>-->
<!--    <td><input type="text" id="title_additionaldoc1" name="title_additionaldoc1" class="form-control filepdf docinput" placeholder="Enter Document Title"></td>-->
<!--    <td style="width:40%;"><input type="file" id="file_additionaldoc1" name="file_additionaldoc1" class="form-control filepdf docinput" accept="application/pdf"></td>-->
                                            <!--</tr>-->
                                        </table>

                                        <script>
                                            function validity_check_click(i)
                                            {
                                                if (document.getElementById("validity_check_" + i).checked == true) {

                                                    $("#validity_check_" + i).val('Yes');

                                                    $("#validity_span_" + i).hide();
                                                    $("#validity_input_" + i).show();

                                                    $("#validity_from_" + i + " > input").prop('required', true);
                                                    $("#validity_to_" + i + " > input").prop('required', true);
                                                } else {

                                                    $("#validity_check_" + i).val('No');

                                                    $("#validity_input_" + i).hide();
                                                    $("#validity_span_" + i).show();

                                                    $("#validity_from_" + i + " > input").prop('required', false);
                                                    $("#validity_to_" + i + " > input").prop('required', false);
                                                }
                                            }

                                            function file_check_click(i)
                                            {
                                                if (document.getElementById("file_check_" + i).checked == true) {

                                                    $("#file_check_" + i).val('Yes');

                                                    $("#file_span_" + i).hide();
                                                    $("#file_input_" + i).show();

                                                    $("#file_input_" + i + " > input").prop('required', true);
                                                } else {
                                                    $("#file_check_" + i).val('No');

                                                    $("#file_input_" + i).hide();
                                                    $("#file_span_" + i).show();

                                                    $("#file_input_" + i + " > input").prop('required', false);
                                                }
                                            }
                                        </script>


                                    </div>

                                    <center>
                                        <!--<button id="save-fake" class="btn-success" style="padding:1px 4px; font-size:15px; margin-top:5px; border-radius: 5px;">Save</button>-->
                                        <br>
                                        <input id="save-orig" type="submit" class="btn btn-success btn-lg" name="submit" value="Submit to Manager" style="font-size:15px;">
                                        <br><br>
                                    </center>

                                </form>
                            </div>

                            <br><hr>


                            <div style="overflow-x:scroll;">
                                <h2> Existing Proposals : </h2>
                                <table id="StudyProposals" class="table table-stripe table-bordered table-responsive" cellspacing="0">
                                    <thead>
                                        <tr class="theadtr theadtr2">
                                            <th style="display:none;">EC Meeting Date</th>
                                            <th>Study Title</th>
                                            <th class="text-center">Protocol Number</th>
                                            <th class="text-center" id="sortbydate">Created date</th>
                                            <th class="text-center">Study Documents</th>
                                            <th class="text-center">EC Approval Document</th>
                                            <th class="text-center">Action</th>
                                            <!--<th class="text-center">Manager Approval Status</th>-->
                                        </tr>
                                    </thead>
                                    <tbody class="tbodystripes">
                                        <tr>
                                            <td style="display:none;">0000-00-00</td>
                                            <td>Test098735475</td>
                                            <td>P09323987</td>
                                            <td>2022-02-09</td>
                                            <td class="text-center"><a href="https://ikanektrnd.com/adichunchanagiri/admin/ethics_committee/sponsor_study_docs_view/155" class="btn btn-lg btn-info"> View </a></td>
                                            <td class="text-center"><b style="color:maroon;">N/A</b></td>
                                            <td class="text-center"> 
                                                <abbr title="Edit option available only until shared to EC!"><b style="color:grey;"> N/A </b></abbr> 
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
            </div>

        </div>

    </body>
</html>







