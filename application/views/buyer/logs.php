<!DOCTYPE html>
<html lang="en">

    <?php $this->load->view('buyer/partials/header'); ?>

    <body class="hold-transition light-skin sidebar-mini theme-blueindigo onlyheader">

        <div class="wrapper">

            <div class="art-bg">
                <img src="<?php echo base_url('assets/'); ?>images/art1.svg" alt="" class="art-img light-img">
                <img src="<?php echo base_url('assets/'); ?>images/art2.svg" alt="" class="art-img dark-img">
                <img src="<?php echo base_url('assets/'); ?>images/art-bg.svg" alt="" class="wave-img light-img">
                <img src="<?php echo base_url('assets/'); ?>images/art-bg2.svg" alt="" class="wave-img dark-img">
            </div>

            <?php $this->load->view('buyer/partials/navbar'); ?>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <div class="container-full clearfix position-relative">	

                    <?php $this->load->view('buyer/partials/sidebar'); ?>

                    <!-- Main content -->
                    <section class="content">

                        <!-- Content Header (Page header) -->	  
                        <div class="content-header">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-block">
                                    <h3 class="page-title br-0">Logs</h3>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-12">
                                <div class="box">
                                    <div class="box-body text-center">
                                        <table id="example" class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
                                            <thead>
                                                <tr>
                                                    <th>Sl.No</th>
                                                    <th>Action</th>
                                                    <th>By</th>
                                                    <th>Role</th>
                                                    <th>Action Info</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr style="margin-right: 20px;">
                                                    <td>1</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-05-26 10:12:03</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>2</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-05-24 14:00:43</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>3</td>
                                                    <td>Login</td>
                                                    <td>Nanda Kumar</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Nanda Kumar sign in into RMS as buyer at 2022-05-24 13:55:48</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>4</td>
                                                    <td>Approve Misc                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has Approved Misc  with id #0000000036 at 2022-05-24 13:55:34</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>5</td>
                                                    <td>OTP Authentication                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has Authenticated OTP with MISC id #0000000036 at 2022-05-24 13:55:29</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>6</td>
                                                    <td>Submit Misc Approval Draft                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has been Submit Misc Approval Draft with id #0000000036 at 2022-05-24 13:54:51</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>7</td>
                                                    <td>Return Misc                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has Returned Misc  with id #0000000036 at 2022-05-24 13:54:14</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>8</td>
                                                    <td>Submit MISC Approval                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has been Submit MISC Approval with id #0000000036 at 2022-05-24 13:53:47</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>9</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-05-24 13:52:43</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>10</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-05-24 11:56:59</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>11</td>
                                                    <td>Wrong OTP                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has Entered Wrong OTP with Budget id #0000000053 at 2022-05-20 15:16:49</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>12</td>
                                                    <td>Re-Float Budget                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has been Re-Floated Budget with id #0000000053 at 2022-05-20 15:16:00</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>13</td>
                                                    <td>Return Budget                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has Returned Budget  with id #0000000053 at 2022-05-20 15:10:36</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>14</td>
                                                    <td>Submit Budget Approval Draft                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has been Submit Budget Approval Draft with id #0000000053 at 2022-05-20 15:08:28</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>15</td>
                                                    <td>Save Budget Approval                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has been Save Budget Approval with id #0000000053 at 2022-05-20 15:08:13</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>16</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-05-20 15:07:15</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>17</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-05-19 11:39:18</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>18</td>
                                                    <td>Login</td>
                                                    <td>Singam Anand Kumar</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Singam Anand Kumar sign in into RMS as buyer at 2022-05-13 12:40:02</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>19</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-05-04 13:59:58</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>20</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-04-26 11:18:24</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>21</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-04-08 10:51:06</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>22</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-04-08 10:02:48</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>23</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2022-04-07 12:25:29</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>24</td>
                                                    <td>Create Indent                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has created new indent with id #236 with 6 items at 2022-04-07 12:25:14</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>25</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-04-07 12:24:02</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>26</td>
                                                    <td>Login</td>
                                                    <td>Singam Anand Kumar</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Singam Anand Kumar sign in into RMS as buyer at 2022-03-23 16:36:03</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>27</td>
                                                    <td>Create Indent                                                                                                        </td>
                                                    <td>Singam Anand Kumar</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Singam Anand Kumar has created new indent with id #235 with 3 items at 2022-03-23 14:21:13</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>28</td>
                                                    <td>Create Indent                                                                                                        </td>
                                                    <td>Singam Anand Kumar</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Singam Anand Kumar has created new indent with id #234 with 3 items at 2022-03-23 14:17:40</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>29</td>
                                                    <td>Login</td>
                                                    <td>Singam Anand Kumar</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Singam Anand Kumar sign in into RMS as buyer at 2022-03-23 14:15:08</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>30</td>
                                                    <td>Approve Budget                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has Approved MISC  with id #0000000035 at 2022-03-21 17:59:27</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>31</td>
                                                    <td>OTP Authentication                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has Authenticated OTP with MISC id #0000000035 at 2022-03-21 17:59:18</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>32</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-03-21 17:58:29</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>33</td>
                                                    <td>Approve Budget                                                                                                        </td>
                                                    <td>Singam Anand Kumar</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Singam Anand Kumar has Approved MISC  with id #0000000035 at 2022-03-21 17:57:50</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>34</td>
                                                    <td>OTP Authentication                                                                                                        </td>
                                                    <td>Singam Anand Kumar</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Singam Anand Kumar has Authenticated OTP with MISC id #0000000035 at 2022-03-21 17:57:30</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>35</td>
                                                    <td>Login</td>
                                                    <td>Singam Anand Kumar</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Singam Anand Kumar sign in into RMS as buyer at 2022-03-21 17:56:57</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>36</td>
                                                    <td>Submit MISC Approval Draft                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has been Submit MISC Approval Draft with id #0000000035 at 2022-03-21 17:55:45</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>37</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-03-21 17:54:37</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>38</td>
                                                    <td>Return Budget                                                                                                        </td>
                                                    <td>Singam Anand Kumar</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Singam Anand Kumar has Returned MISC  with id #0000000035 at 2022-03-21 17:54:16</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>39</td>
                                                    <td>Login</td>
                                                    <td>Singam Anand Kumar</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Singam Anand Kumar sign in into RMS as buyer at 2022-03-21 17:53:36</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>40</td>
                                                    <td>Re-Correct Budget                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has been Re-Correct MISC with id #0000000035 at 2022-03-21 17:53:00</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>41</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-03-21 17:46:47</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>42</td>
                                                    <td>Return MISC (Text Correction)                                                                                                        </td>
                                                    <td>Singam Anand Kumar</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Singam Anand Kumar has Return MISC (Text Correction)  with id #0000000035 at 2022-03-21 17:46:33</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>43</td>
                                                    <td>Return MISC (Text Correction)                                                                                                        </td>
                                                    <td>Singam Anand Kumar</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Singam Anand Kumar has Return MISC (Text Correction)  with id #0000000035 at 2022-03-21 17:46:32</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>44</td>
                                                    <td>OTP Authentication                                                                                                        </td>
                                                    <td>Singam Anand Kumar</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Singam Anand Kumar has Authenticated OTP with MISC id #0000000035 at 2022-03-21 17:46:18</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>45</td>
                                                    <td>OTP Authentication                                                                                                        </td>
                                                    <td>Singam Anand Kumar</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Singam Anand Kumar has Authenticated OTP with MISC id #0000000035 at 2022-03-21 17:42:44</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>46</td>
                                                    <td>Login</td>
                                                    <td>Singam Anand Kumar</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Singam Anand Kumar sign in into RMS as buyer at 2022-03-21 17:41:56</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>47</td>
                                                    <td>Submit MISC Approval Draft                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has been Submit MISC Approval Draft with id #0000000035 at 2022-03-21 17:39:04</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>48</td>
                                                    <td>Save MISC Approval                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has been Save MISC Approval with id #0000000035 at 2022-03-21 17:38:53</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>49</td>
                                                    <td>Save MISC Approval                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has been Save MISC Approval with id #0000000035 at 2022-03-21 17:38:40</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>50</td>
                                                    <td>Cancel MISC Approval                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has cancelled NFA with id #0000000034 at 2022-03-21 17:37:46</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>51</td>
                                                    <td>Submit MISC Approval Draft                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has been Submit MISC Approval Draft with id #0000000034 at 2022-03-21 17:27:12</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>52</td>
                                                    <td>Save MISC Approval                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has been Save MISC Approval with id #0000000034 at 2022-03-21 17:25:17</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>53</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-03-21 17:24:14</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>54</td>
                                                    <td>Approve Budget                                                                                                        </td>
                                                    <td>Nanda Kumar</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Nanda Kumar has Approved MISC  with id #0000000033 at 2022-03-21 17:09:50</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>55</td>
                                                    <td>OTP Authentication                                                                                                        </td>
                                                    <td>Nanda Kumar</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Nanda Kumar has Authenticated OTP with MISC id #0000000033 at 2022-03-21 17:08:19</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>56</td>
                                                    <td>OTP Authentication                                                                                                        </td>
                                                    <td>Nanda Kumar</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Nanda Kumar has Authenticated OTP with MISC id #0000000033 at 2022-03-21 17:05:59</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>57</td>
                                                    <td>Login</td>
                                                    <td>Nanda Kumar</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Nanda Kumar sign in into RMS as buyer at 2022-03-21 17:04:56</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>58</td>
                                                    <td>Submit MISC Approval Draft                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has been Submit MISC Approval Draft with id #0000000033 at 2022-03-21 17:04:32</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>59</td>
                                                    <td>Save MISC Approval                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has been Save MISC Approval with id #0000000033 at 2022-03-21 17:02:34</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>60</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-03-21 17:01:33</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>61</td>
                                                    <td>Login</td>
                                                    <td>Singam Anand Kumar</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Singam Anand Kumar sign in into RMS as buyer at 2022-03-21 16:32:14</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>62</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-03-11 13:31:03</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>63</td>
                                                    <td>Allotment Request                                                                                                        </td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has sent allotment request to nanda@vendorglobe.com, prasad.haridas@larsentoubro.com (Auto Approval by system) with quotation id #233 at 2022-03-08 16:46:01</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>64</td>
                                                    <td>Login</td>
                                                    <td>Nanda Kumar</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Nanda Kumar sign in into RMS as buyer at 2022-03-08 16:42:16</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>65</td>
                                                    <td>Re-Submit Auction                                                                                                        </td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">vendor NK Enterprises has re-submitted auction with auction id #233 with 6 items at 2022-03-08 16:41:56</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>66</td>
                                                    <td>Re-Submit Auction                                                                                                        </td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">vendor NK Enterprises has re-submitted auction with auction id #233 with 6 items at 2022-03-08 16:41:20</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>67</td>
                                                    <td>Submit Auction                                                                                                        </td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">vendor NK Enterprises has submitted reverse auction with auction id #233 with 6 items at 2022-03-08 16:40:41</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>68</td>
                                                    <td>Login</td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">NK Enterprises sign in into RMS as vendor at 2022-03-08 16:40:04</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>69</td>
                                                    <td>Re-Submit Auction                                                                                                        </td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">vendor Sanmitha Enterprises has re-submitted auction with auction id #233 with 6 items at 2022-03-08 16:39:51</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>70</td>
                                                    <td>Re-Submit Auction                                                                                                        </td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">vendor Sanmitha Enterprises has re-submitted auction with auction id #233 with 6 items at 2022-03-08 16:39:19</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>71</td>
                                                    <td>Re-Submit Auction                                                                                                        </td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">vendor Sanmitha Enterprises has re-submitted auction with auction id #233 with 6 items at 2022-03-08 16:37:48</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>72</td>
                                                    <td>Submit Auction                                                                                                        </td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">vendor Sanmitha Enterprises has submitted reverse auction with auction id #233 with 6 items at 2022-03-08 16:37:13</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>73</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2022-03-08 16:35:45</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>74</td>
                                                    <td>Invitation Reverse Auction                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has sent Reverse Auction Invitation with id #233 at 2022-03-08 16:34:32</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>75</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-03-08 16:34:11</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>76</td>
                                                    <td>T&amp;C Accepted                                                                                                        </td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">NK Enterprises have been accepted T&amp;C for reverse auction with auction id #233 at 2022-03-08 16:34:00</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>77</td>
                                                    <td>Login</td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">NK Enterprises sign in into RMS as vendor at 2022-03-08 16:33:52</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>78</td>
                                                    <td>T&amp;C Accepted                                                                                                        </td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises have been accepted T&amp;C for reverse auction with auction id #233 at 2022-03-08 16:33:44</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>79</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2022-03-08 16:33:34</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>80</td>
                                                    <td>Create Auction                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has created reverse auction with id #233 with 6 items at 2022-03-08 16:33:18</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>81</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-03-08 16:31:12</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>82</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-03-08 11:43:52</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>83</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-03-08 11:32:26</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>84</td>
                                                    <td>Allotment Request                                                                                                        </td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has sent allotment request to nanda@vendorglobe.com (Auto Approval by system) with quotation id #232 at 2022-03-08 10:54:01</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>85</td>
                                                    <td>Login</td>
                                                    <td>Nanda Kumar</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Nanda Kumar sign in into RMS as buyer at 2022-03-08 10:45:32</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>86</td>
                                                    <td>Re-Submit Auction                                                                                                        </td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">vendor NK Enterprises has re-submitted auction with auction id #232 with 6 items at 2022-03-08 10:45:17</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>87</td>
                                                    <td>Submit Auction                                                                                                        </td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">vendor NK Enterprises has submitted reverse auction with auction id #232 with 6 items at 2022-03-08 10:45:05</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>88</td>
                                                    <td>Login</td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">NK Enterprises sign in into RMS as vendor at 2022-03-08 10:43:49</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>89</td>
                                                    <td>Re-Submit Auction                                                                                                        </td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">vendor Sanmitha Enterprises has re-submitted auction with auction id #232 with 6 items at 2022-03-08 10:43:36</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>90</td>
                                                    <td>Re-Submit Auction                                                                                                        </td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">vendor Sanmitha Enterprises has re-submitted auction with auction id #232 with 6 items at 2022-03-08 10:43:24</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>91</td>
                                                    <td>Submit Auction                                                                                                        </td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">vendor Sanmitha Enterprises has submitted reverse auction with auction id #232 with 6 items at 2022-03-08 10:43:09</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>92</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2022-03-08 10:42:25</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>93</td>
                                                    <td>Invitation Reverse Auction                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has sent Reverse Auction Invitation with id #232 at 2022-03-08 10:42:11</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>94</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-03-08 10:41:50</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>95</td>
                                                    <td>T&amp;C Accepted                                                                                                        </td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">NK Enterprises have been accepted T&amp;C for reverse auction with auction id #232 at 2022-03-08 10:41:26</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>96</td>
                                                    <td>Login</td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">NK Enterprises sign in into RMS as vendor at 2022-03-08 10:41:18</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>97</td>
                                                    <td>T&amp;C Accepted                                                                                                        </td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises have been accepted T&amp;C for reverse auction with auction id #232 at 2022-03-08 10:41:11</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>98</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2022-03-08 10:41:03</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>99</td>
                                                    <td>Create Auction                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has created reverse auction with id #232 with 6 items at 2022-03-08 10:40:50</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>100</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-03-08 10:37:18</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>101</td>
                                                    <td>Login</td>
                                                    <td>Sai Siddhartha Maddirala</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sai Siddhartha Maddirala sign in into RMS as buyer at 2022-03-03 09:32:00</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>102</td>
                                                    <td>Login</td>
                                                    <td>Sai Siddhartha Maddirala</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sai Siddhartha Maddirala sign in into RMS as buyer at 2022-03-02 21:47:56</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>103</td>
                                                    <td>Login</td>
                                                    <td>Sai Siddhartha Maddirala</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sai Siddhartha Maddirala sign in into RMS as buyer at 2022-03-02 21:46:22</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>104</td>
                                                    <td>Login</td>
                                                    <td>Pravin Wankhede</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Pravin Wankhede sign in into RMS as buyer at 2022-03-02 21:34:57</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>105</td>
                                                    <td>Create Privileges</td>
                                                    <td>Sai Siddhartha Maddirala</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sai Siddhartha Maddirala has removed 'NFA Reports' privileges for user acocunt with name #Pravin Wankhede at 2022-03-02 21:34:47</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>106</td>
                                                    <td>Create Privileges</td>
                                                    <td>Sai Siddhartha Maddirala</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sai Siddhartha Maddirala has added 'Lead Time Reports' privileges to user acocunt with name #Pravin Wankhede at 2022-03-02 21:34:41</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>107</td>
                                                    <td>Create Privileges</td>
                                                    <td>Sai Siddhartha Maddirala</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sai Siddhartha Maddirala has added 'NFA Reports' privileges to user acocunt with name #Pravin Wankhede at 2022-03-02 21:34:21</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>108</td>
                                                    <td>Login</td>
                                                    <td>Sai Siddhartha Maddirala</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sai Siddhartha Maddirala sign in into RMS as buyer at 2022-03-02 21:33:28</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>109</td>
                                                    <td>Login</td>
                                                    <td>Pravin Wankhede</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Pravin Wankhede sign in into RMS as buyer at 2022-03-02 21:33:23</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>110</td>
                                                    <td>Login</td>
                                                    <td>Pravin Wankhede</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Pravin Wankhede sign in into RMS as buyer at 2022-03-02 21:28:56</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>111</td>
                                                    <td>Login</td>
                                                    <td>Sai Siddhartha Maddirala</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sai Siddhartha Maddirala sign in into RMS as buyer at 2022-03-02 21:25:54</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>112</td>
                                                    <td>Login</td>
                                                    <td>Sai Siddhartha Maddirala</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sai Siddhartha Maddirala sign in into RMS as buyer at 2022-03-02 21:25:16</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>113</td>
                                                    <td>Login</td>
                                                    <td>Sai Siddhartha Maddirala</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sai Siddhartha Maddirala sign in into RMS as buyer at 2022-03-02 21:23:46</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>114</td>
                                                    <td>Approve NFA                                                                                                        </td>
                                                    <td>Tirumala Rao</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Tirumala Rao has Approved NFA  with id #0000000030 at 2022-03-02 21:23:27</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>115</td>
                                                    <td>OTP Authentication                                                                                                        </td>
                                                    <td>Tirumala Rao</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Tirumala Rao has Authenticated OTP with NFA id #0000000030 at 2022-03-02 21:23:16</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>116</td>
                                                    <td>Login</td>
                                                    <td>Tirumala Rao</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Tirumala Rao sign in into RMS as buyer at 2022-03-02 21:22:41</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>117</td>
                                                    <td>Approve NFA                                                                                                        </td>
                                                    <td>Sadashiv Kargutkar</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sadashiv Kargutkar has Approved NFA  with id #0000000030 at 2022-03-02 21:22:33</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>118</td>
                                                    <td>OTP Authentication                                                                                                        </td>
                                                    <td>Sadashiv Kargutkar</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sadashiv Kargutkar has Authenticated OTP with NFA id #0000000030 at 2022-03-02 21:22:28</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>119</td>
                                                    <td>Login</td>
                                                    <td>Sadashiv Kargutkar</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sadashiv Kargutkar sign in into RMS as buyer at 2022-03-02 21:21:54</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>120</td>
                                                    <td>Approve NFA                                                                                                        </td>
                                                    <td>Parth Ubgade</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Parth Ubgade has Approved NFA  with id #0000000030 at 2022-03-02 21:21:35</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>121</td>
                                                    <td>OTP Authentication                                                                                                        </td>
                                                    <td>Parth Ubgade</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Parth Ubgade has Authenticated OTP with NFA id #0000000030 at 2022-03-02 21:21:30</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>122</td>
                                                    <td>Login</td>
                                                    <td>Parth Ubgade</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Parth Ubgade sign in into RMS as buyer at 2022-03-02 21:21:08</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>123</td>
                                                    <td>Login</td>
                                                    <td>Sai Siddhartha Maddirala</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sai Siddhartha Maddirala sign in into RMS as buyer at 2022-03-02 21:19:04</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>124</td>
                                                    <td>Approve NFA                                                                                                        </td>
                                                    <td>Pravin Wankhede</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Pravin Wankhede has Approved NFA  with id #0000000030 at 2022-03-02 21:18:58</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>125</td>
                                                    <td>OTP Authentication                                                                                                        </td>
                                                    <td>Pravin Wankhede</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Pravin Wankhede has Authenticated OTP with NFA id #0000000030 at 2022-03-02 21:18:53</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>126</td>
                                                    <td>Login</td>
                                                    <td>Pravin Wankhede</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Pravin Wankhede sign in into RMS as buyer at 2022-03-02 21:17:25</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>127</td>
                                                    <td>Approve NFA                                                                                                        </td>
                                                    <td>Abraham Jose</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Abraham Jose has Approved NFA  with id #0000000030 at 2022-03-02 21:17:12</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>128</td>
                                                    <td>OTP Authentication                                                                                                        </td>
                                                    <td>Abraham Jose</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Abraham Jose has Authenticated OTP with NFA id #0000000030 at 2022-03-02 21:17:07</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>129</td>
                                                    <td>Login</td>
                                                    <td>Abraham Jose</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Abraham Jose sign in into RMS as buyer at 2022-03-02 21:16:44</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>130</td>
                                                    <td>Submit NFA Draft                                                                                                        </td>
                                                    <td>Sai Siddhartha Maddirala</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sai Siddhartha Maddirala has been Submit NFA Draft with id #0000000030 at 2022-03-02 21:16:28</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>131</td>
                                                    <td>Update User</td>
                                                    <td>Sai Siddhartha Maddirala</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sai Siddhartha Maddirala has updated user profile of Sadashiv Kargutkar and assigned  role at 2022-03-02 21:14:24</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>132</td>
                                                    <td>Update User</td>
                                                    <td>Sai Siddhartha Maddirala</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sai Siddhartha Maddirala has updated user profile of Tirumala Rao and assigned  role at 2022-03-02 21:14:11</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>133</td>
                                                    <td>Login</td>
                                                    <td>Sai Siddhartha Maddirala</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sai Siddhartha Maddirala sign in into RMS as buyer at 2022-03-02 21:13:39</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>134</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-03-02 18:22:28</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>135</td>
                                                    <td>Login</td>
                                                    <td>Abraham Jose</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Abraham Jose sign in into RMS as buyer at 2022-03-02 18:22:01</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>136</td>
                                                    <td>Login</td>
                                                    <td>Singam Anand Kumar</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Singam Anand Kumar sign in into RMS as buyer at 2022-03-02 18:21:45</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>137</td>
                                                    <td>Login</td>
                                                    <td>Tirumala Rao</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Tirumala Rao sign in into RMS as buyer at 2022-03-02 18:21:38</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>138</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-03-02 18:20:52</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>139</td>
                                                    <td>Login</td>
                                                    <td>Sai Siddhartha Maddirala</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sai Siddhartha Maddirala sign in into RMS as buyer at 2022-03-02 13:10:17</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>140</td>
                                                    <td>Approve NFA                                                                                                        </td>
                                                    <td>Tirumala Rao</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Tirumala Rao has Approved NFA  with id #0000000029 at 2022-03-02 13:10:08</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>141</td>
                                                    <td>OTP Authentication                                                                                                        </td>
                                                    <td>Tirumala Rao</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Tirumala Rao has Authenticated OTP with NFA id #0000000029 at 2022-03-02 13:10:05</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>142</td>
                                                    <td>Login</td>
                                                    <td>Tirumala Rao</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Tirumala Rao sign in into RMS as buyer at 2022-03-02 13:06:27</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>143</td>
                                                    <td>Approve NFA                                                                                                        </td>
                                                    <td>Sadashiv Kargutkar</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sadashiv Kargutkar has Approved NFA  with id #0000000029 at 2022-03-02 13:06:19</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>144</td>
                                                    <td>OTP Authentication                                                                                                        </td>
                                                    <td>Sadashiv Kargutkar</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sadashiv Kargutkar has Authenticated OTP with NFA id #0000000029 at 2022-03-02 13:06:07</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>145</td>
                                                    <td>Login</td>
                                                    <td>Sadashiv Kargutkar</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sadashiv Kargutkar sign in into RMS as buyer at 2022-03-02 13:04:33</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>146</td>
                                                    <td>Approve NFA                                                                                                        </td>
                                                    <td>Parth Ubgade</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Parth Ubgade has Approved NFA  with id #0000000029 at 2022-03-02 13:04:25</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>147</td>
                                                    <td>OTP Authentication                                                                                                        </td>
                                                    <td>Parth Ubgade</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Parth Ubgade has Authenticated OTP with NFA id #0000000029 at 2022-03-02 13:04:21</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>148</td>
                                                    <td>Login</td>
                                                    <td>Parth Ubgade</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Parth Ubgade sign in into RMS as buyer at 2022-03-02 13:03:52</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>149</td>
                                                    <td>Approve NFA                                                                                                        </td>
                                                    <td>Pravin Wankhede</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Pravin Wankhede has Approved NFA  with id #0000000029 at 2022-03-02 13:03:22</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>150</td>
                                                    <td>OTP Authentication                                                                                                        </td>
                                                    <td>Pravin Wankhede</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Pravin Wankhede has Authenticated OTP with NFA id #0000000029 at 2022-03-02 13:03:17</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>151</td>
                                                    <td>Login</td>
                                                    <td>Pravin Wankhede</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Pravin Wankhede sign in into RMS as buyer at 2022-03-02 13:02:54</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>152</td>
                                                    <td>Approve NFA                                                                                                        </td>
                                                    <td>Abraham Jose</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Abraham Jose has Approved NFA  with id #0000000029 at 2022-03-02 13:02:31</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>153</td>
                                                    <td>OTP Authentication                                                                                                        </td>
                                                    <td>Abraham Jose</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Abraham Jose has Authenticated OTP with NFA id #0000000029 at 2022-03-02 13:02:27</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>154</td>
                                                    <td>Login</td>
                                                    <td>Abraham Jose</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Abraham Jose sign in into RMS as buyer at 2022-03-02 13:01:54</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>155</td>
                                                    <td>Submit NFA Draft                                                                                                        </td>
                                                    <td>Sai Siddhartha Maddirala</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sai Siddhartha Maddirala has been Submit NFA Draft with id #0000000029 at 2022-03-02 13:01:09</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>156</td>
                                                    <td>Cancel NFA                                                                                                        </td>
                                                    <td>Sai Siddhartha Maddirala</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sai Siddhartha Maddirala has cancelled NFA with id #0000000028 at 2022-03-02 12:58:52</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>157</td>
                                                    <td>NFA Reminder                                                                                                        </td>
                                                    <td>Sai Siddhartha Maddirala</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sai Siddhartha Maddirala has sent NFA Reminder with id #0000000028 at 2022-03-02 12:58:39</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>158</td>
                                                    <td>Login</td>
                                                    <td>Sai Siddhartha Maddirala</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sai Siddhartha Maddirala sign in into RMS as buyer at 2022-03-02 12:58:27</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>159</td>
                                                    <td>Login</td>
                                                    <td>Tirumala Rao</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Tirumala Rao sign in into RMS as buyer at 2022-03-02 12:58:15</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>160</td>
                                                    <td>Login</td>
                                                    <td>Sai Siddhartha Maddirala</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sai Siddhartha Maddirala sign in into RMS as buyer at 2022-03-02 12:57:53</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>161</td>
                                                    <td>Login</td>
                                                    <td>Singam Anand Kumar</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Singam Anand Kumar sign in into RMS as buyer at 2022-03-01 20:39:23</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>162</td>
                                                    <td>Login</td>
                                                    <td>Sai Siddhartha Maddirala</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sai Siddhartha Maddirala sign in into RMS as buyer at 2022-03-01 14:52:23</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>163</td>
                                                    <td>Login</td>
                                                    <td>Sai Siddhartha Maddirala</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sai Siddhartha Maddirala sign in into RMS as buyer at 2022-03-01 14:41:36</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>164</td>
                                                    <td>Login</td>
                                                    <td>Sai Siddhartha Maddirala</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sai Siddhartha Maddirala sign in into RMS as buyer at 2022-03-01 10:42:15</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>165</td>
                                                    <td>Submit NFA Draft                                                                                                        </td>
                                                    <td>Sai Siddhartha Maddirala</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sai Siddhartha Maddirala has been Submit NFA Draft with id #0000000028 at 2022-03-01 10:27:23</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>166</td>
                                                    <td>Save NFA Draft                                                                                                        </td>
                                                    <td>Sai Siddhartha Maddirala</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sai Siddhartha Maddirala has been Save NFA Draft with id #0000000028 at 2022-03-01 10:27:10</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>167</td>
                                                    <td>Save NFA Draft                                                                                                        </td>
                                                    <td>Sai Siddhartha Maddirala</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sai Siddhartha Maddirala has been Save NFA Draft with id #0000000028 at 2022-03-01 10:25:04</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>168</td>
                                                    <td>Save NFA Draft                                                                                                        </td>
                                                    <td>Sai Siddhartha Maddirala</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sai Siddhartha Maddirala has been Save NFA Draft with id #0000000028 at 2022-03-01 10:20:53</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>169</td>
                                                    <td>Activate User</td>
                                                    <td>Pravin Wankhede</td>
                                                    <td>Test</td>
                                                    <td style="max-width: 600px;">User Pravin Wankhede with designation Test has been activated his/her account by clicking on activation link at 2022-03-01 10:20:51</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>170</td>
                                                    <td>Activate User</td>
                                                    <td>Pravin Wankhede</td>
                                                    <td>Test</td>
                                                    <td style="max-width: 600px;">User Pravin Wankhede with designation Test has been activated his/her account by clicking on activation link at 2022-03-01 10:20:51</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>171</td>
                                                    <td>Create Privileges</td>
                                                    <td>Sai Siddhartha Maddirala</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sai Siddhartha Maddirala has added 'NFA Management, Is Approver' privileges to user acocunt with name #Abraham Jose at 2022-03-01 10:19:39</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>172</td>
                                                    <td>Create Privileges</td>
                                                    <td>Sai Siddhartha Maddirala</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sai Siddhartha Maddirala has added 'NFA Management, Is Approver' privileges to user acocunt with name #Pravin Wankhede at 2022-03-01 10:17:40</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>173</td>
                                                    <td>New User</td>
                                                    <td>Sai Siddhartha Maddirala</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sai Siddhartha Maddirala has created new user Pravin Wankhede and assigned  role at 2022-03-01 10:17:20</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>174</td>
                                                    <td>New User</td>
                                                    <td>Sai Siddhartha Maddirala</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sai Siddhartha Maddirala has created new user Abraham Jose and assigned  role at 2022-03-01 10:15:15</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>175</td>
                                                    <td>Create Privileges</td>
                                                    <td>Sai Siddhartha Maddirala</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sai Siddhartha Maddirala has added 'NFA Management, Is Approver' privileges to user acocunt with name #Parth Ubgade at 2022-03-01 10:14:10</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>176</td>
                                                    <td>New User</td>
                                                    <td>Sai Siddhartha Maddirala</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sai Siddhartha Maddirala has created new user Parth Ubgade and assigned  role at 2022-03-01 10:13:35</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>177</td>
                                                    <td>Save NFA Draft                                                                                                        </td>
                                                    <td>Sai Siddhartha Maddirala</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sai Siddhartha Maddirala has been Save NFA Draft with id #0000000028 at 2022-03-01 10:04:05</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>178</td>
                                                    <td>Login</td>
                                                    <td>Sai Siddhartha Maddirala</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sai Siddhartha Maddirala sign in into RMS as buyer at 2022-03-01 10:00:26</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>179</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-02-28 17:52:27</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>180</td>
                                                    <td>Allotment Request                                                                                                        </td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has sent allotment request to nanda@vendorglobe.com (Auto Approval by system) with quotation id #231 at 2022-02-28 10:55:02</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>181</td>
                                                    <td>Login</td>
                                                    <td>Nanda Kumar</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Nanda Kumar sign in into RMS as buyer at 2022-02-28 10:48:43</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>182</td>
                                                    <td>Re-Submit Auction                                                                                                        </td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">vendor NK Enterprises has re-submitted auction with auction id #231 with 6 items at 2022-02-28 10:48:29</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>183</td>
                                                    <td>Re-Submit Auction                                                                                                        </td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">vendor NK Enterprises has re-submitted auction with auction id #231 with 6 items at 2022-02-28 10:48:16</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>184</td>
                                                    <td>Submit Auction                                                                                                        </td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">vendor NK Enterprises has submitted reverse auction with auction id #231 with 6 items at 2022-02-28 10:48:02</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>185</td>
                                                    <td>Login</td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">NK Enterprises sign in into RMS as vendor at 2022-02-28 10:47:34</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>186</td>
                                                    <td>Re-Submit Auction                                                                                                        </td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">vendor Sanmitha Enterprises has re-submitted auction with auction id #231 with 6 items at 2022-02-28 10:47:22</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>187</td>
                                                    <td>Re-Submit Auction                                                                                                        </td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">vendor Sanmitha Enterprises has re-submitted auction with auction id #231 with 6 items at 2022-02-28 10:47:07</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>188</td>
                                                    <td>Submit Auction                                                                                                        </td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">vendor Sanmitha Enterprises has submitted reverse auction with auction id #231 with 6 items at 2022-02-28 10:46:39</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>189</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2022-02-28 10:45:50</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>190</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2022-02-28 10:45:08</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>191</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2022-02-28 10:43:59</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>192</td>
                                                    <td>Invitation Reverse Auction                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has sent Reverse Auction Invitation with id #231 at 2022-02-28 10:43:47</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>193</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-02-28 10:43:14</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>194</td>
                                                    <td>T&amp;C Accepted                                                                                                        </td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">NK Enterprises have been accepted T&amp;C for reverse auction with auction id #231 at 2022-02-28 10:43:07</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>195</td>
                                                    <td>Login</td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">NK Enterprises sign in into RMS as vendor at 2022-02-28 10:43:00</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>196</td>
                                                    <td>T&amp;C Accepted                                                                                                        </td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises have been accepted T&amp;C for reverse auction with auction id #231 at 2022-02-28 10:42:54</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>197</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2022-02-28 10:42:46</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>198</td>
                                                    <td>Create Auction                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has created reverse auction with id #231 with 6 items at 2022-02-28 10:42:37</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>199</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-02-28 10:41:09</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>200</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-02-25 21:35:20</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>201</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-02-25 17:58:22</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>202</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-02-25 16:20:53</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>203</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-02-25 15:15:07</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>204</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-02-25 15:03:42</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>205</td>
                                                    <td>Allotment Request                                                                                                        </td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has sent allotment request to nanda@vendorglobe.com (Auto Approval by system) with quotation id #230 at 2022-02-25 14:58:01</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>206</td>
                                                    <td>Login</td>
                                                    <td>Nanda Kumar</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Nanda Kumar sign in into RMS as buyer at 2022-02-25 14:54:55</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>207</td>
                                                    <td>Enable User</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has Enable user profile of Nanda Kumar with role buyer at 2022-02-25 14:54:47</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>208</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-02-25 14:54:39</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>209</td>
                                                    <td>Change User Account</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has updated user password of Nanda Kumar at 2022-02-25 14:54:02</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>210</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-02-25 14:53:39</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>211</td>
                                                    <td>Re-Submit Auction                                                                                                        </td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">vendor NK Enterprises has re-submitted auction with auction id #230 with 6 items at 2022-02-25 14:52:20</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>212</td>
                                                    <td>Submit Auction                                                                                                        </td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">vendor NK Enterprises has submitted reverse auction with auction id #230 with 6 items at 2022-02-25 14:51:16</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>213</td>
                                                    <td>Login</td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">NK Enterprises sign in into RMS as vendor at 2022-02-25 14:50:47</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>214</td>
                                                    <td>Re-Submit Auction                                                                                                        </td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">vendor Sanmitha Enterprises has re-submitted auction with auction id #230 with 6 items at 2022-02-25 14:50:34</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>215</td>
                                                    <td>Re-Submit Auction                                                                                                        </td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">vendor Sanmitha Enterprises has re-submitted auction with auction id #230 with 6 items at 2022-02-25 14:50:19</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>216</td>
                                                    <td>Submit Auction                                                                                                        </td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">vendor Sanmitha Enterprises has submitted reverse auction with auction id #230 with 6 items at 2022-02-25 14:49:34</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>217</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2022-02-25 14:48:43</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>218</td>
                                                    <td>Invitation Reverse Auction                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has sent Reverse Auction Invitation with id #230 at 2022-02-25 14:48:29</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>219</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-02-25 14:48:20</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>220</td>
                                                    <td>T&amp;C Accepted                                                                                                        </td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">NK Enterprises have been accepted T&amp;C for reverse auction with auction id #230 at 2022-02-25 14:48:12</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>221</td>
                                                    <td>Login</td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">NK Enterprises sign in into RMS as vendor at 2022-02-25 14:48:05</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>222</td>
                                                    <td>T&amp;C Accepted                                                                                                        </td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises have been accepted T&amp;C for reverse auction with auction id #230 at 2022-02-25 14:47:58</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>223</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2022-02-25 14:47:50</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>224</td>
                                                    <td>Create Auction                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has created reverse auction with id #230 with 6 items at 2022-02-25 14:47:40</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>225</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-02-25 14:46:39</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>226</td>
                                                    <td>Allotment Request                                                                                                        </td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has sent allotment request to nanda@vendorglobe.com (Auto Approval by system) with quotation id #229 at 2022-02-25 13:15:01</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>227</td>
                                                    <td>Re-Submit Auction                                                                                                        </td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">vendor NK Enterprises has re-submitted auction with auction id #229 with 6 items at 2022-02-25 12:44:12</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>228</td>
                                                    <td>Re-Submit Auction                                                                                                        </td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">vendor NK Enterprises has re-submitted auction with auction id #229 with 6 items at 2022-02-25 12:43:59</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>229</td>
                                                    <td>Submit Auction                                                                                                        </td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">vendor NK Enterprises has submitted reverse auction with auction id #229 with 6 items at 2022-02-25 12:43:44</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>230</td>
                                                    <td>Login</td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">NK Enterprises sign in into RMS as vendor at 2022-02-25 12:43:14</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>231</td>
                                                    <td>Re-Submit Auction                                                                                                        </td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">vendor Sanmitha Enterprises has re-submitted auction with auction id #229 with 6 items at 2022-02-25 12:42:51</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>232</td>
                                                    <td>Re-Submit Auction                                                                                                        </td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">vendor Sanmitha Enterprises has re-submitted auction with auction id #229 with 6 items at 2022-02-25 12:42:32</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>233</td>
                                                    <td>Re-Submit Auction                                                                                                        </td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">vendor Sanmitha Enterprises has re-submitted auction with auction id #229 with 6 items at 2022-02-25 12:42:20</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>234</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2022-02-25 12:41:54</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>235</td>
                                                    <td>Re-Submit Auction                                                                                                        </td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">vendor Sanmitha Enterprises has re-submitted auction with auction id #229 with 6 items at 2022-02-25 12:41:11</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>236</td>
                                                    <td>Re-Submit Auction                                                                                                        </td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">vendor Sanmitha Enterprises has re-submitted auction with auction id #229 with 6 items at 2022-02-25 12:40:56</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>237</td>
                                                    <td>Re-Submit Auction                                                                                                        </td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">vendor Sanmitha Enterprises has re-submitted auction with auction id #229 with 6 items at 2022-02-25 12:38:44</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>238</td>
                                                    <td>Re-Submit Auction                                                                                                        </td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">vendor Sanmitha Enterprises has re-submitted auction with auction id #229 with 6 items at 2022-02-25 12:38:33</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>239</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2022-02-25 12:38:17</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>240</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2022-02-25 12:33:33</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>241</td>
                                                    <td>Re-Submit Auction                                                                                                        </td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">vendor Sanmitha Enterprises has re-submitted auction with auction id #229 with 6 items at 2022-02-25 12:32:03</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>242</td>
                                                    <td>Submit Auction                                                                                                        </td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">vendor Sanmitha Enterprises has submitted reverse auction with auction id #229 with 6 items at 2022-02-25 12:31:43</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>243</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2022-02-25 12:31:11</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>244</td>
                                                    <td>Invitation Reverse Auction                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has sent Reverse Auction Invitation with id #229 at 2022-02-25 12:30:57</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>245</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-02-25 12:30:46</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>246</td>
                                                    <td>T&amp;C Accepted                                                                                                        </td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">NK Enterprises have been accepted T&amp;C for reverse auction with auction id #229 at 2022-02-25 12:30:41</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>247</td>
                                                    <td>Login</td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">NK Enterprises sign in into RMS as vendor at 2022-02-25 12:30:34</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>248</td>
                                                    <td>T&amp;C Accepted                                                                                                        </td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises have been accepted T&amp;C for reverse auction with auction id #229 at 2022-02-25 12:30:27</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>249</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2022-02-25 12:30:18</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>250</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-02-25 12:29:59</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>251</td>
                                                    <td>Allotment Request                                                                                                        </td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has sent allotment request to nanda@vendorglobe.com (Auto Approval by system) with quotation id #228 at 2022-02-25 12:26:01</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>252</td>
                                                    <td>Login</td>
                                                    <td>Sai Siddhartha Maddirala</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sai Siddhartha Maddirala sign in into RMS as buyer at 2022-02-25 12:19:14</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>253</td>
                                                    <td>Create Auction                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has created reverse auction with id #229 with 6 items at 2022-02-25 12:15:44</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>254</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-02-25 12:14:31</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>255</td>
                                                    <td>Re-Submit Auction                                                                                                        </td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">vendor NK Enterprises has re-submitted auction with auction id #228 with 6 items at 2022-02-25 12:13:35</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>256</td>
                                                    <td>Re-Submit Auction                                                                                                        </td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">vendor NK Enterprises has re-submitted auction with auction id #228 with 6 items at 2022-02-25 12:12:47</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>257</td>
                                                    <td>Login</td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">NK Enterprises sign in into RMS as vendor at 2022-02-25 12:12:27</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>258</td>
                                                    <td>Submit Auction                                                                                                        </td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">vendor NK Enterprises has submitted reverse auction with auction id #228 with 6 items at 2022-02-25 12:11:37</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>259</td>
                                                    <td>Login</td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">NK Enterprises sign in into RMS as vendor at 2022-02-25 12:11:10</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>260</td>
                                                    <td>Re-Submit Auction                                                                                                        </td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">vendor Sanmitha Enterprises has re-submitted auction with auction id #228 with 6 items at 2022-02-25 12:10:51</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>261</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2022-02-25 12:10:29</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>262</td>
                                                    <td>Submit Auction                                                                                                        </td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">vendor Sanmitha Enterprises has submitted reverse auction with auction id #228 with 6 items at 2022-02-25 12:08:02</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>263</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2022-02-25 12:07:13</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>264</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-02-25 12:01:53</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>265</td>
                                                    <td>Invitation Reverse Auction                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has sent Reverse Auction Invitation with id #228 at 2022-02-25 12:01:41</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>266</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-02-25 12:01:19</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>267</td>
                                                    <td>T&amp;C Accepted                                                                                                        </td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">NK Enterprises have been accepted T&amp;C for reverse auction with auction id #228 at 2022-02-25 12:01:10</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>268</td>
                                                    <td>Login</td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">NK Enterprises sign in into RMS as vendor at 2022-02-25 12:01:00</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>269</td>
                                                    <td>T&amp;C Accepted                                                                                                        </td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises have been accepted T&amp;C for reverse auction with auction id #228 at 2022-02-25 12:00:53</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>270</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2022-02-25 12:00:44</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>271</td>
                                                    <td>Create Auction                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has created reverse auction with id #228 with 6 items at 2022-02-25 12:00:30</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>272</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-02-25 11:43:32</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>273</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-02-25 11:43:17</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>274</td>
                                                    <td>Save NFA Draft                                                                                                        </td>
                                                    <td>Sai Siddhartha Maddirala</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sai Siddhartha Maddirala has been Save NFA Draft with id #0000000027 at 2022-02-25 09:51:34</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>275</td>
                                                    <td>Login</td>
                                                    <td>Sai Siddhartha Maddirala</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sai Siddhartha Maddirala sign in into RMS as buyer at 2022-02-25 09:46:52</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>276</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-02-24 18:06:34</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>277</td>
                                                    <td>Login</td>
                                                    <td>Singam Anand Kumar</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Singam Anand Kumar sign in into RMS as buyer at 2022-02-24 17:44:44</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>278</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-02-24 17:34:47</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>279</td>
                                                    <td>Login</td>
                                                    <td>Singam Anand Kumar</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Singam Anand Kumar sign in into RMS as buyer at 2022-02-24 17:32:51</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>280</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-02-24 17:27:28</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>281</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-02-24 16:39:24</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>282</td>
                                                    <td>Enable User</td>
                                                    <td>Singam Anand Kumar</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Singam Anand Kumar has Enable user profile of Sanmitha Keshav with role buyer at 2022-02-24 13:41:16</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>283</td>
                                                    <td>Disable User</td>
                                                    <td>Singam Anand Kumar</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Singam Anand Kumar has Disable user profile of Sanmitha Keshav with role buyer at 2022-02-24 13:38:05</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>284</td>
                                                    <td>Enable User</td>
                                                    <td>Singam Anand Kumar</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Singam Anand Kumar has Enable user profile of Vachan Singh with role buyer at 2022-02-24 13:37:25</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>285</td>
                                                    <td>Enable User</td>
                                                    <td>Singam Anand Kumar</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Singam Anand Kumar has Enable user profile of Sanmitha Keshav with role buyer at 2022-02-24 13:37:05</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>286</td>
                                                    <td>Disable User</td>
                                                    <td>Singam Anand Kumar</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Singam Anand Kumar has Disable user profile of Vachan Singh with role buyer at 2022-02-24 13:33:33</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>287</td>
                                                    <td>Disable User</td>
                                                    <td>Singam Anand Kumar</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Singam Anand Kumar has Disable user profile of Vishal Kapadia with role buyer at 2022-02-24 13:33:00</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>288</td>
                                                    <td>Disable User</td>
                                                    <td>Singam Anand Kumar</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Singam Anand Kumar has Disable user profile of Umesh Renukuntla with role buyer at 2022-02-24 13:30:38</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>289</td>
                                                    <td>Disable User</td>
                                                    <td>Singam Anand Kumar</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Singam Anand Kumar has Disable user profile of Sanmitha Keshav with role buyer at 2022-02-24 13:29:59</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>290</td>
                                                    <td>Enable User</td>
                                                    <td>Singam Anand Kumar</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Singam Anand Kumar has Enable user profile of Sanmitha Keshav with role buyer at 2022-02-24 13:29:45</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>291</td>
                                                    <td>Enable User</td>
                                                    <td>Singam Anand Kumar</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Singam Anand Kumar has Enable user profile of Nanda FL with role buyer at 2022-02-24 13:29:05</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>292</td>
                                                    <td>Disable User</td>
                                                    <td>Singam Anand Kumar</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Singam Anand Kumar has Disable user profile of Sanmitha Keshav with role buyer at 2022-02-24 13:29:00</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>293</td>
                                                    <td>Disable User</td>
                                                    <td>Singam Anand Kumar</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Singam Anand Kumar has Disable user profile of Nanda FL with role buyer at 2022-02-24 13:28:40</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>294</td>
                                                    <td>Enable User</td>
                                                    <td>Singam Anand Kumar</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Singam Anand Kumar has Enable user profile of Vinu with role buyer at 2022-02-24 13:28:30</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>295</td>
                                                    <td>Disable User</td>
                                                    <td>Singam Anand Kumar</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Singam Anand Kumar has Disable user profile of Vinu with role buyer at 2022-02-24 13:28:18</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>296</td>
                                                    <td>Enable User</td>
                                                    <td>Singam Anand Kumar</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Singam Anand Kumar has Enable user profile of Sanmitha with role buyer at 2022-02-24 13:28:05</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>297</td>
                                                    <td>Disable User</td>
                                                    <td>Singam Anand Kumar</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Singam Anand Kumar has Disable user profile of Sanmitha with role buyer at 2022-02-24 13:27:57</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>298</td>
                                                    <td>Login</td>
                                                    <td>Singam Anand Kumar</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Singam Anand Kumar sign in into RMS as buyer at 2022-02-24 13:25:41</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>299</td>
                                                    <td>Approve NFA                                                                                                        </td>
                                                    <td>Vachan Singh</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Vachan Singh has Approved NFA  with id #0000000026 at 2022-02-24 13:25:30</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>300</td>
                                                    <td>OTP Authentication                                                                                                        </td>
                                                    <td>Vachan Singh</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Vachan Singh has Authenticated OTP with NFA id #0000000026 at 2022-02-24 13:25:21</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>301</td>
                                                    <td>Login</td>
                                                    <td>Vachan Singh</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Vachan Singh sign in into RMS as buyer at 2022-02-24 13:24:52</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>302</td>
                                                    <td>Approve NFA                                                                                                        </td>
                                                    <td>Umesh Renukuntla</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Umesh Renukuntla has Approved NFA  with id #0000000026 at 2022-02-24 13:23:19</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>303</td>
                                                    <td>OTP Authentication                                                                                                        </td>
                                                    <td>Umesh Renukuntla</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Umesh Renukuntla has Authenticated OTP with NFA id #0000000026 at 2022-02-24 13:23:12</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>304</td>
                                                    <td>Login</td>
                                                    <td>Umesh Renukuntla</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Umesh Renukuntla sign in into RMS as buyer at 2022-02-24 13:22:45</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>305</td>
                                                    <td>Approve NFA                                                                                                        </td>
                                                    <td>Vishal Kapadia</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Vishal Kapadia has Approved NFA  with id #0000000026 at 2022-02-24 13:22:02</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>306</td>
                                                    <td>OTP Authentication                                                                                                        </td>
                                                    <td>Vishal Kapadia</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Vishal Kapadia has Authenticated OTP with NFA id #0000000026 at 2022-02-24 13:21:54</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>307</td>
                                                    <td>Login</td>
                                                    <td>Vishal Kapadia</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Vishal Kapadia sign in into RMS as buyer at 2022-02-24 13:21:25</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>308</td>
                                                    <td>Approve NFA                                                                                                        </td>
                                                    <td>Sanmitha Keshav</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha Keshav has Approved NFA  with id #0000000026 at 2022-02-24 13:20:32</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>309</td>
                                                    <td>OTP Authentication                                                                                                        </td>
                                                    <td>Sanmitha Keshav</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha Keshav has Authenticated OTP with NFA id #0000000026 at 2022-02-24 13:20:25</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>310</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Keshav</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha Keshav sign in into RMS as buyer at 2022-02-24 13:19:56</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>311</td>
                                                    <td>Approve NFA                                                                                                        </td>
                                                    <td>Nanda FL</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Nanda FL has Approved NFA  with id #0000000026 at 2022-02-24 13:19:07</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>312</td>
                                                    <td>OTP Authentication                                                                                                        </td>
                                                    <td>Nanda FL</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Nanda FL has Authenticated OTP with NFA id #0000000026 at 2022-02-24 13:18:47</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>313</td>
                                                    <td>Login</td>
                                                    <td>Nanda FL</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Nanda FL sign in into RMS as buyer at 2022-02-24 13:18:16</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>314</td>
                                                    <td>Approve NFA                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has Approved NFA  with id #0000000026 at 2022-02-24 13:16:54</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>315</td>
                                                    <td>OTP Authentication                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has Authenticated OTP with NFA id #0000000026 at 2022-02-24 13:16:45</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>316</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-02-24 13:15:59</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>317</td>
                                                    <td>Approve NFA                                                                                                        </td>
                                                    <td>Vinu</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Vinu has Approved NFA  with id #0000000026 at 2022-02-24 13:15:26</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>318</td>
                                                    <td>OTP Authentication                                                                                                        </td>
                                                    <td>Vinu</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Vinu has Authenticated OTP with NFA id #0000000026 at 2022-02-24 13:15:16</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>319</td>
                                                    <td>Login</td>
                                                    <td>Vinu</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Vinu sign in into RMS as buyer at 2022-02-24 13:14:43</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>320</td>
                                                    <td>Approve NFA                                                                                                        </td>
                                                    <td>Singam Anand Kumar</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Singam Anand Kumar has Approved NFA  with id #0000000026 at 2022-02-24 13:13:50</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>321</td>
                                                    <td>OTP Authentication                                                                                                        </td>
                                                    <td>Singam Anand Kumar</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Singam Anand Kumar has Authenticated OTP with NFA id #0000000026 at 2022-02-24 13:13:40</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>322</td>
                                                    <td>Login</td>
                                                    <td>Singam Anand Kumar</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Singam Anand Kumar sign in into RMS as buyer at 2022-02-24 13:12:53</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>323</td>
                                                    <td>Submit NFA Draft                                                                                                        </td>
                                                    <td>Singam Anand Kumar</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Singam Anand Kumar has been Submit NFA Draft with id #0000000026 at 2022-02-24 13:11:33</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>324</td>
                                                    <td>Login</td>
                                                    <td>Singam Anand Kumar</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Singam Anand Kumar sign in into RMS as buyer at 2022-02-24 13:01:41</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>325</td>
                                                    <td>Login</td>
                                                    <td>Singam Anand Kumar</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Singam Anand Kumar sign in into RMS as buyer at 2022-02-24 12:17:35</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>326</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-02-24 12:13:39</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>327</td>
                                                    <td>Login</td>
                                                    <td>Singam Anand Kumar</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Singam Anand Kumar sign in into RMS as buyer at 2022-02-24 12:13:25</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>328</td>
                                                    <td>Disable User</td>
                                                    <td>Singam Anand Kumar</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Singam Anand Kumar has Disable user profile of Nanda Kumar with role buyer at 2022-02-24 12:12:24</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>329</td>
                                                    <td>Approve NFA                                                                                                        </td>
                                                    <td>Singam Anand Kumar</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Singam Anand Kumar has Approved NFA  with id #0000000025 at 2022-02-24 12:10:58</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>330</td>
                                                    <td>Approve NFA                                                                                                        </td>
                                                    <td>Singam Anand Kumar</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Singam Anand Kumar has Approved NFA  with id #0000000025 at 2022-02-24 12:08:47</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>331</td>
                                                    <td>Approve NFA                                                                                                        </td>
                                                    <td>Singam Anand Kumar</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Singam Anand Kumar has Approved NFA  with id #0000000025 at 2022-02-24 12:07:26</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>332</td>
                                                    <td>OTP Authentication                                                                                                        </td>
                                                    <td>Singam Anand Kumar</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Singam Anand Kumar has Authenticated OTP with NFA id #0000000025 at 2022-02-24 12:07:22</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>333</td>
                                                    <td>Login</td>
                                                    <td>Singam Anand Kumar</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Singam Anand Kumar sign in into RMS as buyer at 2022-02-24 12:06:56</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>334</td>
                                                    <td>Approve NFA                                                                                                        </td>
                                                    <td>Nanda Kumar</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Nanda Kumar has Approved NFA  with id #0000000025 at 2022-02-24 12:06:47</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>335</td>
                                                    <td>OTP Authentication                                                                                                        </td>
                                                    <td>Nanda Kumar</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Nanda Kumar has Authenticated OTP with NFA id #0000000025 at 2022-02-24 12:06:43</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>336</td>
                                                    <td>Login</td>
                                                    <td>Nanda Kumar</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Nanda Kumar sign in into RMS as buyer at 2022-02-24 12:06:22</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>337</td>
                                                    <td>Approve NFA                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has Approved NFA  with id #0000000025 at 2022-02-24 12:06:04</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>338</td>
                                                    <td>OTP Authentication                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has Authenticated OTP with NFA id #0000000025 at 2022-02-24 12:06:00</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>339</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-02-24 12:05:09</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>340</td>
                                                    <td>Re-Float NFA                                                                                                        </td>
                                                    <td>Singam Anand Kumar</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Singam Anand Kumar has been Re-Floated NFA with id #0000000025 at 2022-02-24 12:05:00</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>341</td>
                                                    <td>Login</td>
                                                    <td>Singam Anand Kumar</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Singam Anand Kumar sign in into RMS as buyer at 2022-02-24 12:04:25</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>342</td>
                                                    <td>Return NFA                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has Returned NFA  with id #0000000025 at 2022-02-24 12:04:10</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>343</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-02-24 12:03:54</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>344</td>
                                                    <td>Submit NFA Draft                                                                                                        </td>
                                                    <td>Singam Anand Kumar</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Singam Anand Kumar has been Submit NFA Draft with id #0000000025 at 2022-02-24 12:03:36</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>345</td>
                                                    <td>Login</td>
                                                    <td>Singam Anand Kumar</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Singam Anand Kumar sign in into RMS as buyer at 2022-02-24 12:01:35</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>346</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-02-24 12:01:01</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>347</td>
                                                    <td>Allotment Request                                                                                                        </td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has sent allotment request to nanda@vendorglobe.com (Auto Approval by system) with quotation id #227 at 2022-02-23 18:12:01</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>348</td>
                                                    <td>Login</td>
                                                    <td>Nanda Kumar</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Nanda Kumar sign in into RMS as buyer at 2022-02-23 18:03:24</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>349</td>
                                                    <td>Re-Submit Auction                                                                                                        </td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">vendor NK Enterprises has re-submitted auction with auction id #227 with 6 items at 2022-02-23 18:03:07</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>350</td>
                                                    <td>Submit Auction                                                                                                        </td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">vendor NK Enterprises has submitted forward auction with auction id #227 with 6 items at 2022-02-23 18:02:43</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>351</td>
                                                    <td>Login</td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">NK Enterprises sign in into RMS as vendor at 2022-02-23 18:02:08</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>352</td>
                                                    <td>Re-Submit Auction                                                                                                        </td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">vendor Sanmitha Enterprises has re-submitted auction with auction id #227 with 6 items at 2022-02-23 18:01:56</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>353</td>
                                                    <td>Submit Auction                                                                                                        </td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">vendor Sanmitha Enterprises has submitted forward auction with auction id #227 with 6 items at 2022-02-23 18:01:28</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>354</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2022-02-23 18:00:37</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>355</td>
                                                    <td>Invitation Forward Auction                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has sent Forward Auction Invitation with id #227 at 2022-02-23 18:00:24</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>356</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-02-23 18:00:10</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>357</td>
                                                    <td>T&amp;C Accepted                                                                                                        </td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">NK Enterprises has been accepted T&amp;C for forward auction with auction id #227 at 2022-02-23 18:00:03</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>358</td>
                                                    <td>Login</td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">NK Enterprises sign in into RMS as vendor at 2022-02-23 17:59:52</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>359</td>
                                                    <td>T&amp;C Accepted                                                                                                        </td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises has been accepted T&amp;C for forward auction with auction id #227 at 2022-02-23 17:59:43</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>360</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2022-02-23 17:59:33</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>361</td>
                                                    <td>Create Auction                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has created Forward Auction with id #227 with 6 items at 2022-02-23 17:59:22</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>362</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-02-23 17:58:23</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>363</td>
                                                    <td>Allotment Request                                                                                                        </td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has sent allotment request to nanda@vendorglobe.com (Auto Approval by system) with quotation id #226 at 2022-02-23 17:54:01</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>364</td>
                                                    <td>Login</td>
                                                    <td>Nanda Kumar</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Nanda Kumar sign in into RMS as buyer at 2022-02-23 17:50:11</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>365</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-02-23 17:48:45</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>366</td>
                                                    <td>Re-Submit Auction                                                                                                        </td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">vendor NK Enterprises has re-submitted auction with auction id #226 with 6 items at 2022-02-23 17:48:25</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>367</td>
                                                    <td>Re-Submit Auction                                                                                                        </td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">vendor NK Enterprises has re-submitted auction with auction id #226 with 6 items at 2022-02-23 17:45:56</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>368</td>
                                                    <td>Submit Auction                                                                                                        </td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">vendor NK Enterprises has submitted reverse auction with auction id #226 with 6 items at 2022-02-23 17:44:35</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>369</td>
                                                    <td>Login</td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">NK Enterprises sign in into RMS as vendor at 2022-02-23 17:43:49</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>370</td>
                                                    <td>Re-Submit Auction                                                                                                        </td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">vendor Sanmitha Enterprises has re-submitted auction with auction id #226 with 6 items at 2022-02-23 17:43:17</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>371</td>
                                                    <td>Submit Auction                                                                                                        </td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">vendor Sanmitha Enterprises has submitted reverse auction with auction id #226 with 6 items at 2022-02-23 17:42:21</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>372</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2022-02-23 17:41:35</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>373</td>
                                                    <td>Invitation Reverse Auction                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has sent Reverse Auction Invitation with id #226 at 2022-02-23 17:41:23</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>374</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-02-23 17:41:10</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>375</td>
                                                    <td>T&amp;C Accepted                                                                                                        </td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">NK Enterprises have been accepted T&amp;C for reverse auction with auction id #226 at 2022-02-23 17:41:02</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>376</td>
                                                    <td>Login</td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">NK Enterprises sign in into RMS as vendor at 2022-02-23 17:40:54</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>377</td>
                                                    <td>T&amp;C Accepted                                                                                                        </td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises have been accepted T&amp;C for reverse auction with auction id #226 at 2022-02-23 17:40:47</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>378</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2022-02-23 17:40:36</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>379</td>
                                                    <td>Create Auction                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has created reverse auction with id #226 with 6 items at 2022-02-23 17:40:26</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>380</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-02-23 17:39:22</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>381</td>
                                                    <td>Auto Cancel FA</td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has auto cancelled Forward Auction with Id #225 due to no replies before expiry date at 2022-02-23 17:23:01</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>382</td>
                                                    <td>Invitation Forward Auction                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has sent Forward Auction Invitation with id #225 at 2022-02-23 13:23:12</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>383</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-02-23 13:23:01</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>384</td>
                                                    <td>T&amp;C Accepted                                                                                                        </td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises has been accepted T&amp;C for forward auction with auction id #225 at 2022-02-23 13:22:56</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>385</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2022-02-23 13:22:46</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>386</td>
                                                    <td>Login</td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">NK Enterprises sign in into RMS as vendor at 2022-02-23 13:22:33</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>387</td>
                                                    <td>Create Auction                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has created Forward Auction with id #225 with 6 items at 2022-02-23 13:22:25</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>388</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-02-23 13:18:26</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>389</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2022-02-23 13:14:33</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>390</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2022-02-23 13:09:15</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>391</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2022-02-23 13:07:32</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>392</td>
                                                    <td>Login</td>
                                                    <td>Singam Anand Kumar</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Singam Anand Kumar sign in into RMS as buyer at 2022-02-23 13:07:00</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>393</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2022-02-23 13:01:06</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>394</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-02-23 12:57:00</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>395</td>
                                                    <td>Auto Cancel RA</td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has auto cancelled Reverse Auction with Id #224 due to no replies before expiry date at 2022-02-23 12:55:02</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>396</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2022-02-23 12:43:42</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>397</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2022-02-23 12:23:49</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>398</td>
                                                    <td>Invitation Reverse Auction                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has sent Reverse Auction Invitation with id #224 at 2022-02-23 12:23:40</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>399</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-02-23 12:23:15</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>400</td>
                                                    <td>T&amp;C Accepted                                                                                                        </td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">NK Enterprises have been accepted T&amp;C for reverse auction with auction id #224 at 2022-02-23 12:23:09</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>401</td>
                                                    <td>Login</td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">NK Enterprises sign in into RMS as vendor at 2022-02-23 12:23:00</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>402</td>
                                                    <td>T&amp;C Accepted                                                                                                        </td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises have been accepted T&amp;C for reverse auction with auction id #224 at 2022-02-23 12:22:53</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>403</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2022-02-23 12:22:43</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>404</td>
                                                    <td>Create Auction                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has created reverse auction with id #224 with 6 items at 2022-02-23 12:22:28</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>405</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-02-23 12:21:06</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>406</td>
                                                    <td>Auto Cancel FA</td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has auto cancelled Forward Auction with Id #223 due to no replies before expiry date at 2022-02-18 22:03:01</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>407</td>
                                                    <td>Allotment Request                                                                                                        </td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has sent allotment request to sanmithakeshav@gmail.com (Auto Approval by system) with quotation id #221 at 2022-02-18 19:06:01</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>408</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2022-02-18 16:36:15</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>409</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2022-02-18 12:58:17</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>410</td>
                                                    <td>Create Auction                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has created Forward Auction with id #223 with 6 items at 2022-02-18 12:58:03</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>411</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-02-18 12:57:02</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>412</td>
                                                    <td>Negotiate Quote                                                                                                        </td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">vendor Sanmitha Enterprises has negotiated quote with id #221 with 2 items at 2022-02-17 18:23:43</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>413</td>
                                                    <td>Negotiate Quote                                                                                                        </td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">vendor Sanmitha Enterprises has negotiated quote with id #221 with 2 items at 2022-02-17 18:23:10</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>414</td>
                                                    <td>Negotiate Quote                                                                                                        </td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">vendor Sanmitha Enterprises has negotiated quote with id #221 with 2 items at 2022-02-17 18:20:44</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>415</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2022-02-17 18:16:13</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>416</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2022-02-17 16:38:25</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>417</td>
                                                    <td>Allotment Request                                                                                                        </td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has sent allotment request to nanda@vendorglobe.com (Auto Approval by system) with quotation id #222 at 2022-02-16 13:54:01</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>418</td>
                                                    <td>Login</td>
                                                    <td>Nanda Kumar</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Nanda Kumar sign in into RMS as buyer at 2022-02-16 13:48:30</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>419</td>
                                                    <td>Login</td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">NK Enterprises sign in into RMS as vendor at 2022-02-16 13:47:23</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>420</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2022-02-16 13:46:24</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>421</td>
                                                    <td>Submit Auction                                                                                                        </td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">vendor NK Enterprises has submitted forward auction with auction id #222 with 1 items at 2022-02-16 13:46:10</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>422</td>
                                                    <td>Login</td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">NK Enterprises sign in into RMS as vendor at 2022-02-16 13:45:45</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>423</td>
                                                    <td>Submit Auction                                                                                                        </td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">vendor Sanmitha Enterprises has submitted forward auction with auction id #222 with 1 items at 2022-02-16 13:45:29</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>424</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2022-02-16 13:44:51</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>425</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2022-02-16 13:44:28</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>426</td>
                                                    <td>Invitation Forward Auction                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has sent Forward Auction Invitation with id #222 at 2022-02-16 13:44:13</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>427</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-02-16 13:43:37</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>428</td>
                                                    <td>T&amp;C Accepted                                                                                                        </td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">NK Enterprises has been accepted T&amp;C for forward auction with auction id #222 at 2022-02-16 13:43:27</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>429</td>
                                                    <td>Login</td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">NK Enterprises sign in into RMS as vendor at 2022-02-16 13:43:03</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>430</td>
                                                    <td>T&amp;C Accepted                                                                                                        </td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises has been accepted T&amp;C for forward auction with auction id #222 at 2022-02-16 13:42:54</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>431</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2022-02-16 13:42:42</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>432</td>
                                                    <td>Create Auction                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has created Forward Auction with id #222 with 1 items at 2022-02-16 13:42:26</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>433</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-02-16 13:40:25</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>434</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-02-16 13:27:28</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>435</td>
                                                    <td>Re-Submit Auction                                                                                                        </td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">vendor Sanmitha Enterprises has re-submitted auction with auction id #221 with 2 items at 2022-02-10 16:08:46</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>436</td>
                                                    <td>Submit Auction                                                                                                        </td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">vendor Sanmitha Enterprises has submitted forward auction with auction id #221 with 2 items at 2022-02-10 16:07:39</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>437</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2022-02-10 16:06:28</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>438</td>
                                                    <td>Invitation Forward Auction                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has sent Forward Auction Invitation with id #221 at 2022-02-10 16:06:19</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>439</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-02-10 16:05:56</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>440</td>
                                                    <td>T&amp;C Accepted                                                                                                        </td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises has been accepted T&amp;C for forward auction with auction id #221 at 2022-02-10 16:05:47</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>441</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2022-02-10 16:05:32</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>442</td>
                                                    <td>Create Auction                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has created Forward Auction with id #221 with 2 items at 2022-02-10 16:05:20</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>443</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-02-10 16:02:02</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>444</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2022-02-10 15:50:23</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>445</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-02-10 15:47:39</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>446</td>
                                                    <td>Login</td>
                                                    <td>Singam Anand Kumar</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Singam Anand Kumar sign in into RMS as buyer at 2022-02-04 13:48:16</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>447</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-02-04 10:18:11</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>448</td>
                                                    <td>Allotment Request                                                                                                        </td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has sent allotment request to nanda@vendorglobe.com (Auto Approval by system) with quotation id #220 at 2022-02-03 22:44:01</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>449</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-02-03 18:02:14</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>450</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2022-02-03 17:55:01</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>451</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-02-03 17:49:35</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>452</td>
                                                    <td>Re-Submit Auction                                                                                                        </td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">vendor Sanmitha Enterprises has re-submitted auction with auction id #220 with 6 items at 2022-02-03 17:48:00</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>453</td>
                                                    <td>Submit Auction                                                                                                        </td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">vendor Sanmitha Enterprises has submitted forward auction with auction id #220 with 6 items at 2022-02-03 17:46:31</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>454</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2022-02-03 17:45:28</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>455</td>
                                                    <td>Invitation Forward Auction                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has sent Forward Auction Invitation with id #220 at 2022-02-03 17:45:17</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>456</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-02-03 17:45:06</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>457</td>
                                                    <td>T&amp;C Accepted                                                                                                        </td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises has been accepted T&amp;C for forward auction with auction id #220 at 2022-02-03 17:44:56</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>458</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2022-02-03 17:44:47</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>459</td>
                                                    <td>Create Auction                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has created Forward Auction with id #220 with 6 items at 2022-02-03 17:44:30</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>460</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-02-03 17:42:48</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>461</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-02-03 16:51:25</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>462</td>
                                                    <td>Allotment Request                                                                                                        </td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has sent allotment request to anandkumar.singam@gmail.com (Auto Approval by system) with quotation id #219 at 2022-02-03 15:45:02</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>463</td>
                                                    <td>Re-Submit Auction                                                                                                        </td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">vendor Sanmitha Enterprises has re-submitted auction with auction id #219 with 1 items at 2022-02-03 15:38:31</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>464</td>
                                                    <td>Re-Submit Auction                                                                                                        </td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">vendor Sanmitha Enterprises has re-submitted auction with auction id #219 with 1 items at 2022-02-03 15:38:12</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>465</td>
                                                    <td>Submit Auction                                                                                                        </td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">vendor Sanmitha Enterprises has submitted reverse auction with auction id #219 with 1 items at 2022-02-03 15:37:44</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>466</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2022-02-03 15:36:54</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>467</td>
                                                    <td>Invitation Reverse Auction                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has sent Reverse Auction Invitation with id #219 at 2022-02-03 15:36:41</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>468</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-02-03 15:35:25</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>469</td>
                                                    <td>T&amp;C Accepted                                                                                                        </td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises have been accepted T&amp;C for reverse auction with auction id #219 at 2022-02-03 15:35:17</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>470</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2022-02-03 15:35:01</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>471</td>
                                                    <td>Create Auction                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has created reverse auction with id #219 with 1 items at 2022-02-03 15:33:37</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>472</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-02-03 15:31:26</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>473</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2022-02-03 10:54:01</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>474</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-01-31 16:05:49</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>475</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2022-01-31 16:04:28</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>476</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-01-31 11:47:10</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>477</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2022-01-28 16:06:05</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>478</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-01-28 16:05:39</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>479</td>
                                                    <td>Login</td>
                                                    <td>Singam Anand Kumar</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Singam Anand Kumar sign in into RMS as buyer at 2022-01-28 15:01:18</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>480</td>
                                                    <td>Allotment Request                                                                                                        </td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has sent allotment request to nanda@vendorglobe.com (Auto Approval by system) with quotation id #218 at 2022-01-24 18:11:01</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>481</td>
                                                    <td>Submit Auction                                                                                                        </td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">vendor Sanmitha Enterprises has submitted reverse auction with auction id #218 with 6 items at 2022-01-24 18:00:40</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>482</td>
                                                    <td>Save Auction                                                                                                        </td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">vendor Sanmitha Enterprises has saved reverse auction with auction id #218 with 6 items at 2022-01-24 18:00:32</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>483</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2022-01-24 18:00:12</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>484</td>
                                                    <td>Auctiion Reminder                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has sent auction reminder to sanmitha@vendorglobe.com for reverse auction with auction id #218 at 2022-01-24 17:57:45</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>485</td>
                                                    <td>Invitation Reverse Auction                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has sent Reverse Auction Invitation with id #218 at 2022-01-24 17:57:39</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>486</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-01-24 17:57:28</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>487</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-01-24 17:57:27</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>488</td>
                                                    <td>T&amp;C Accepted                                                                                                        </td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">NK Enterprises have been accepted T&amp;C for reverse auction with auction id #218 at 2022-01-24 17:57:20</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>489</td>
                                                    <td>Login</td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">NK Enterprises sign in into RMS as vendor at 2022-01-24 17:57:14</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>490</td>
                                                    <td>T&amp;C Accepted                                                                                                        </td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises have been accepted T&amp;C for reverse auction with auction id #218 at 2022-01-24 17:57:07</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>491</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2022-01-24 17:56:58</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>492</td>
                                                    <td>Auction Reminder                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has sent reverse auction reminder to sanmitha@vendorglobe.com with auction id #218 at 2022-01-24 17:56:28</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>493</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-01-24 17:56:17</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>494</td>
                                                    <td>Float Auction                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has floated reverse auction with id #218 with 6 items at 2022-01-24 17:54:57</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>495</td>
                                                    <td>Save Auction                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has saved reverse auction with id #218 with 6 items at 2022-01-24 17:54:12</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>496</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-01-24 17:53:09</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>497</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-01-24 17:48:44</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>498</td>
                                                    <td>Wrong OTP                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has Entered Wrong OTP with NFA id #0000000009 at 2022-01-21 16:13:14</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>499</td>
                                                    <td>Wrong OTP                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has Entered Wrong OTP with NFA id #0000000009 at 2022-01-21 16:12:48</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>500</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-01-21 16:04:14</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>501</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-01-21 16:03:40</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>502</td>
                                                    <td>Allotment Request                                                                                                        </td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has sent allotment request to nanda@vendorglobe.com (Auto Approval by system) with quotation id #217 at 2022-01-21 11:36:01</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>503</td>
                                                    <td>Login</td>
                                                    <td>Nanda Kumar</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Nanda Kumar sign in into RMS as buyer at 2022-01-21 11:33:13</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>504</td>
                                                    <td>Login</td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">NK Enterprises sign in into RMS as vendor at 2022-01-21 11:31:51</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>505</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2022-01-21 11:30:27</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>506</td>
                                                    <td>Login</td>
                                                    <td>Nanda Kumar</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Nanda Kumar sign in into RMS as buyer at 2022-01-21 11:29:51</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>507</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-01-21 11:26:55</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>508</td>
                                                    <td>Submit Auction                                                                                                        </td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">vendor Sanmitha Enterprises has submitted quote with id #217 with 6 items at 2022-01-21 11:26:48</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>509</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2022-01-21 11:26:24</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>510</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-01-21 11:25:55</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>511</td>
                                                    <td>Submit Auction                                                                                                        </td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">vendor NK Enterprises has submitted quote with id #217 with 6 items at 2022-01-21 11:25:42</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>512</td>
                                                    <td>Login</td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">NK Enterprises sign in into RMS as vendor at 2022-01-21 11:24:51</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>513</td>
                                                    <td>Save Auction                                                                                                        </td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">vendor Sanmitha Enterprises has saved quote with id #217 with 6 items at 2022-01-21 11:14:15</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>514</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2022-01-21 11:13:36</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>515</td>
                                                    <td>Decremental/Close Time Update                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha have updated Incremental/Decremental value of id #217 at 2022-01-21 11:13:05</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>516</td>
                                                    <td>Invitation Reverse Auction                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has sent Reverse Auction Invitation with id #217 at 2022-01-21 11:12:52</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>517</td>
                                                    <td>RA Reminder                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has sent auction reminder to sanmitha@vendorglobe.com with auction id #217 at 2022-01-21 11:12:42</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>518</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-01-21 11:12:00</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>519</td>
                                                    <td>T&amp;C Accepted                                                                                                        </td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">NK Enterprises have been accepted T&amp;C for NFA with id # at 2022-01-21 11:11:54</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>520</td>
                                                    <td>Login</td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">NK Enterprises sign in into RMS as vendor at 2022-01-21 11:11:48</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>521</td>
                                                    <td>T&amp;C Accepted                                                                                                        </td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises have been accepted T&amp;C for NFA with id # at 2022-01-21 11:11:39</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>522</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2022-01-21 11:11:14</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>523</td>
                                                    <td>Reverse Auction                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has floated reverse Auction with id #1 with 6 items at 2022-01-21 11:05:57</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>524</td>
                                                    <td>Reverse Auction                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has created Reverse Auction with id #217 with 6 items at 2022-01-21 11:04:24</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>525</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-01-21 11:03:08</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>526</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-01-21 09:50:30</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>527</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-01-21 09:45:39</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>528</td>
                                                    <td>Login</td>
                                                    <td>Singam Anand Kumar</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Singam Anand Kumar sign in into RMS as buyer at 2022-01-20 15:57:16</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>529</td>
                                                    <td>Auto Cancel RA</td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has auto cancelled Reverse Auction with Id #216 due to no replies before expiry date at 2022-01-20 14:24:01</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>530</td>
                                                    <td>Auto Cancel RA</td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has auto cancelled Reverse Auction with Id #215 due to no replies before expiry date at 2022-01-20 14:14:01</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>531</td>
                                                    <td>Update Vendor</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Vendor Heritage's profile has been updated by buyer Sanmitha at 2022-01-20 14:11:37</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>532</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-01-20 14:11:10</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>533</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2022-01-20 14:10:35</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>534</td>
                                                    <td>Invitation Reverse Auction                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has sent Reverse Auction Invitation with id #216 at 2022-01-20 14:10:26</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>535</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-01-20 14:10:13</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>536</td>
                                                    <td>Login</td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">NK Enterprises sign in into RMS as vendor at 2022-01-20 14:07:34</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>537</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2022-01-20 14:06:57</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>538</td>
                                                    <td>Reverse Auction                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has created Reverse Auction with id #216 with 6 items at 2022-01-20 14:06:44</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>539</td>
                                                    <td>Allotment Request                                                                                                        </td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has sent allotment request to nanda@vendorglobe.com (Auto Approval by system) with quotation id #214 at 2022-01-20 14:06:01</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>540</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-01-20 14:05:45</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>541</td>
                                                    <td>Reverse Auction                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has created Reverse Auction with id #215 with 6 items at 2022-01-20 14:04:07</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>542</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-01-20 14:00:32</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>543</td>
                                                    <td>Submit Quote                                                                                                        </td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">vendor NK Enterprises has submitted quote with id #214 with 6 items at 2022-01-20 14:00:23</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>544</td>
                                                    <td>Login</td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">NK Enterprises sign in into RMS as vendor at 2022-01-20 13:59:57</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>545</td>
                                                    <td>Submit Quote                                                                                                        </td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">vendor Sanmitha Enterprises has submitted quote with id #214 with 6 items at 2022-01-20 13:58:01</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>546</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2022-01-20 13:56:25</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>547</td>
                                                    <td>Invitation Reverse Auction                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has sent Reverse Auction Invitation with id #214 at 2022-01-20 13:55:29</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>548</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-01-20 13:55:17</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>549</td>
                                                    <td>Login</td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">NK Enterprises sign in into RMS as vendor at 2022-01-20 13:54:17</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>550</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2022-01-20 13:53:22</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>551</td>
                                                    <td>Reverse Auction                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has created Reverse Auction with id #214 with 6 items at 2022-01-20 13:53:12</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>552</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-01-20 13:52:06</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>553</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-01-20 10:34:40</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>554</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-01-19 19:06:32</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>555</td>
                                                    <td>Login</td>
                                                    <td>Singam Anand Kumar</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Singam Anand Kumar sign in into RMS as buyer at 2022-01-19 15:13:56</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>556</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-01-19 15:13:17</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>557</td>
                                                    <td>Edit Privileges</td>
                                                    <td>Nanda Kumar</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Nanda Kumar has added 'Approver Reports, Lead Time Reports' privileges to user acocunt with name #Sanmitha at 2022-01-19 15:13:10</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>558</td>
                                                    <td>Login</td>
                                                    <td>Nanda Kumar</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Nanda Kumar sign in into RMS as buyer at 2022-01-19 15:12:35</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>559</td>
                                                    <td>Edit Privileges</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has added 'Approver Reports, Lead Time Reports' privileges to user acocunt with name #Nanda Kumar at 2022-01-19 15:12:25</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>560</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-01-19 15:12:03</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>561</td>
                                                    <td>Allotment Request                                                                                                        </td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has sent allotment request to nanda@vendorglobe.com (Auto Approval by system) with quotation id #213 at 2022-01-19 15:10:01</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>562</td>
                                                    <td>Login</td>
                                                    <td>Nanda Kumar</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Nanda Kumar sign in into RMS as buyer at 2022-01-19 15:04:48</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>563</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-01-19 15:03:48</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>564</td>
                                                    <td>Submit Auction                                                                                                        </td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">vendor Sanmitha Enterprises has submitted quote with id #213 with 2 items at 2022-01-19 15:03:39</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>565</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2022-01-19 15:01:58</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>566</td>
                                                    <td>Invitation Reverse Auction                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has sent Reverse Auction Invitation with id #213 at 2022-01-19 15:01:50</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>567</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-01-19 15:01:38</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>568</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2022-01-19 15:00:59</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>569</td>
                                                    <td>Reverse Auction                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has created Reverse Auction with id #213 with 2 items at 2022-01-19 15:00:50</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>570</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-01-19 14:59:31</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>571</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2022-01-19 14:59:08</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>572</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2022-01-19 14:01:07</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>573</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-01-17 12:32:41</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>574</td>
                                                    <td>Allotment Request                                                                                                        </td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has sent allotment request to nanda@vendorglobe.com (Auto Approval by system) with quotation id #212 at 2022-01-17 12:13:01</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>575</td>
                                                    <td>Login</td>
                                                    <td>Nanda Kumar</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Nanda Kumar sign in into RMS as buyer at 2022-01-17 12:06:44</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>576</td>
                                                    <td>Submit Auction                                                                                                        </td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">vendor Sanmitha Enterprises has submitted quote with id #212 with 1 items at 2022-01-17 12:06:31</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>577</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2022-01-17 12:04:49</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>578</td>
                                                    <td>Invitation Reverse Auction                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has sent Reverse Auction Invitation with id #212 at 2022-01-17 12:04:40</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>579</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-01-17 12:03:42</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>580</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2022-01-17 12:03:21</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>581</td>
                                                    <td>Reverse Auction                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has created Reverse Auction with id #212 with 1 items at 2022-01-17 12:03:08</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>582</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-01-17 12:02:09</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>583</td>
                                                    <td>Auto Cancel RA</td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has auto cancelled Reverse Auction with Id #211 due to no replies before expiry date at 2022-01-17 12:02:01</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>584</td>
                                                    <td>Login</td>
                                                    <td>Nanda Kumar</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Nanda Kumar sign in into RMS as buyer at 2022-01-17 12:00:38</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>585</td>
                                                    <td>Reverse Auction                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has created Reverse Auction with id #211 with 1 items at 2022-01-17 11:58:18</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>586</td>
                                                    <td>Allotment Request                                                                                                        </td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has sent allotment request to nanda@vendorglobe.com (Auto Approval by system) with quotation id #210 at 2022-01-17 11:56:01</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>587</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-01-17 11:53:56</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>588</td>
                                                    <td>Login</td>
                                                    <td>Nanda Kumar</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Nanda Kumar sign in into RMS as buyer at 2022-01-17 11:51:53</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>589</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-01-17 11:51:03</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>590</td>
                                                    <td>Submit Auction                                                                                                        </td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">vendor NK Enterprises has negotiated quote with id #210 with 6 items at 2022-01-17 11:50:44</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>591</td>
                                                    <td>Login</td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">NK Enterprises sign in into RMS as vendor at 2022-01-17 11:50:15</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>592</td>
                                                    <td>Submit Auction                                                                                                        </td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">vendor NK Enterprises has submitted quote with id #210 with 6 items at 2022-01-17 11:48:58</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>593</td>
                                                    <td>Login</td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">NK Enterprises sign in into RMS as vendor at 2022-01-17 11:48:38</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>594</td>
                                                    <td>Submit Auction                                                                                                        </td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">vendor Sanmitha Enterprises has submitted quote with id #210 with 6 items at 2022-01-17 11:46:29</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>595</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2022-01-17 11:45:58</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>596</td>
                                                    <td>Invitation Reverse Auction                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has sent Reverse Auction Invitation with id #210 at 2022-01-17 11:45:49</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>597</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-01-17 11:45:24</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>598</td>
                                                    <td>Login</td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">NK Enterprises sign in into RMS as vendor at 2022-01-17 11:45:10</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>599</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2022-01-17 11:44:04</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>600</td>
                                                    <td>Reverse Auction                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has created Reverse Auction with id #210 with 6 items at 2022-01-17 11:43:35</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>601</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-01-17 11:40:52</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>602</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-01-14 19:03:46</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>603</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-01-14 11:55:17</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>604</td>
                                                    <td>Allotment Request                                                                                                        </td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has sent allotment request to nanda@vendorglobe.com (Auto Approval by system) with quotation id #209 at 2022-01-13 21:46:01</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>605</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-01-13 16:44:14</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>606</td>
                                                    <td>Submit Auction                                                                                                        </td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">vendor NK Enterprises has submitted quote with id #209 with 6 items at 2022-01-13 16:43:58</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>607</td>
                                                    <td>Login</td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">NK Enterprises sign in into RMS as vendor at 2022-01-13 16:43:14</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>608</td>
                                                    <td>Submit Auction                                                                                                        </td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">vendor Sanmitha Enterprises has submitted quote with id #209 with 6 items at 2022-01-13 16:42:32</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>609</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-01-13 16:38:43</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>610</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2022-01-13 16:38:30</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>611</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-01-13 16:38:16</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>612</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2022-01-13 16:32:04</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>613</td>
                                                    <td>Login</td>
                                                    <td>Singam Anand Kumar</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Singam Anand Kumar sign in into RMS as buyer at 2022-01-13 16:31:13</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>614</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-01-13 14:45:50</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>615</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2022-01-13 14:41:34</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>616</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-01-13 14:41:02</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>617</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2022-01-13 14:38:25</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>618</td>
                                                    <td>Invitation Reverse Auction                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has sent Reverse Auction Invitation with id #209 at 2022-01-13 14:38:16</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>619</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-01-13 14:38:04</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>620</td>
                                                    <td>Login</td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">NK Enterprises sign in into RMS as vendor at 2022-01-13 14:37:48</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>621</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2022-01-13 14:37:24</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>622</td>
                                                    <td>Reverse Auction                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has created Reverse Auction with id #209 with 6 items at 2022-01-13 14:37:14</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>623</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-01-13 13:13:21</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>624</td>
                                                    <td>Login</td>
                                                    <td>Singam Anand Kumar</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Singam Anand Kumar sign in into RMS as buyer at 2022-01-13 12:26:13</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>625</td>
                                                    <td>Login</td>
                                                    <td>Singam Anand Kumar</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Singam Anand Kumar sign in into RMS as buyer at 2022-01-13 12:17:10</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>626</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-01-13 12:05:33</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>627</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-01-12 17:55:07</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>628</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-01-12 14:25:20</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>629</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-01-12 14:04:03</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>630</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-01-12 11:30:52</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>631</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-01-12 11:24:38</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>632</td>
                                                    <td>Edit Privileges</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has added 'Auction Reports' privileges to user acocunt with name #Singam Anand Kumar at 2022-01-10 22:53:45</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>633</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-01-10 22:53:16</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>634</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-01-10 12:16:26</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>635</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2022-01-06 16:54:13</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>636</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-01-06 16:53:56</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>637</td>
                                                    <td>Allotment Request                                                                                                        </td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has sent allotment request to nanda@vendorglobe.com (Auto Approval by system) with quotation id #208 at 2022-01-06 10:39:01</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>638</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-01-06 10:36:16</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>639</td>
                                                    <td>Login</td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">NK Enterprises sign in into RMS as vendor at 2022-01-06 10:33:05</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>640</td>
                                                    <td>Submit Auction                                                                                                        </td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">vendor Sanmitha Enterprises has negotiated quote with id #208 with 6 items at 2022-01-06 10:28:33</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>641</td>
                                                    <td>Submit Auction                                                                                                        </td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">vendor Sanmitha Enterprises has negotiated quote with id #208 with 6 items at 2022-01-06 10:26:59</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>642</td>
                                                    <td>Submit Auction                                                                                                        </td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">vendor Sanmitha Enterprises has submitted quote with id #208 with 6 items at 2022-01-06 10:26:35</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>643</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2022-01-06 10:26:02</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>644</td>
                                                    <td>Invitation Reverse Auction                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has sent Reverse Auction Invitation with id #208 at 2022-01-06 10:25:53</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>645</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-01-06 10:25:40</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>646</td>
                                                    <td>Login</td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">NK Enterprises sign in into RMS as vendor at 2022-01-06 10:25:25</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>647</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2022-01-06 10:25:08</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>648</td>
                                                    <td>Reverse Auction                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has created Reverse Auction with id #208 with 6 items at 2022-01-06 10:24:59</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>649</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-01-06 10:23:51</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>650</td>
                                                    <td>Allotment Request                                                                                                        </td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has sent allotment request to nanda@vendorglobe.com (Auto Approval by system) with quotation id #207 at 2022-01-04 16:36:02</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>651</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-01-04 16:33:50</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>652</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2022-01-04 16:31:31</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>653</td>
                                                    <td>Login</td>
                                                    <td>Nanda Kumar</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Nanda Kumar sign in into RMS as buyer at 2022-01-04 16:29:43</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>654</td>
                                                    <td>Submit Auction                                                                                                        </td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">vendor Sanmitha Enterprises has negotiated quote with id #207 with 6 items at 2022-01-04 16:29:17</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>655</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2022-01-04 16:28:44</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>656</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-01-04 16:28:03</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>657</td>
                                                    <td>Login</td>
                                                    <td>Nanda Kumar</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Nanda Kumar sign in into RMS as buyer at 2022-01-04 16:27:52</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>658</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-01-04 16:26:58</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>659</td>
                                                    <td>Login</td>
                                                    <td>Nanda Kumar</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Nanda Kumar sign in into RMS as buyer at 2022-01-04 16:22:56</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>660</td>
                                                    <td>Submit Auction                                                                                                        </td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">vendor NK Enterprises has negotiated quote with id #207 with 6 items at 2022-01-04 16:20:29</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>661</td>
                                                    <td>Submit Auction                                                                                                        </td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">vendor NK Enterprises has negotiated quote with id #207 with 6 items at 2022-01-04 16:19:46</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>662</td>
                                                    <td>Submit Auction                                                                                                        </td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">vendor NK Enterprises has submitted quote with id #207 with 6 items at 2022-01-04 16:18:43</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>663</td>
                                                    <td>Save Auction                                                                                                        </td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">vendor NK Enterprises has saved quote with id #207 with 6 items at 2022-01-04 16:18:31</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>664</td>
                                                    <td>Login</td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">NK Enterprises sign in into RMS as vendor at 2022-01-04 16:17:58</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>665</td>
                                                    <td>Submit Auction                                                                                                        </td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">vendor Sanmitha Enterprises has negotiated quote with id #207 with 6 items at 2022-01-04 16:17:28</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>666</td>
                                                    <td>Submit Auction                                                                                                        </td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">vendor Sanmitha Enterprises has submitted quote with id #207 with 6 items at 2022-01-04 16:17:03</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>667</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2022-01-04 16:16:05</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>668</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2022-01-04 16:15:38</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>669</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-01-04 16:07:16</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>670</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2022-01-04 16:06:14</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>671</td>
                                                    <td>Invitation Reverse Auction                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has sent Reverse Auction Invitation with id #207 at 2022-01-04 16:05:55</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>672</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-01-04 16:04:46</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>673</td>
                                                    <td>Login</td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">NK Enterprises sign in into RMS as vendor at 2022-01-04 16:04:29</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>674</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2022-01-04 16:03:57</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>675</td>
                                                    <td>Reverse Auction                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has floated reverse Auction with id #1 with 6 items at 2022-01-04 16:03:17</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>676</td>
                                                    <td>Reverse Auction                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has created Reverse Auction with id #207 with 6 items at 2022-01-04 16:02:47</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>677</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-01-04 16:00:35</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>678</td>
                                                    <td>Allotment Request                                                                                                        </td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has sent allotment request to nanda@vendorglobe.com (Auto Approval by system) with quotation id #206 at 2022-01-04 15:47:01</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>679</td>
                                                    <td>Send Invitation</td>
                                                    <td>Nanda Kumar</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Nanda Kumar has sent invitation to nanda@vendorglobe.com including  in CC at 2022-01-04 15:41:03</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>680</td>
                                                    <td>Login</td>
                                                    <td>Nanda Kumar</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Nanda Kumar sign in into RMS as buyer at 2022-01-04 15:37:42</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>681</td>
                                                    <td>Submit Auction                                                                                                        </td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">vendor NK Enterprises has submitted quote with id #206 with 6 items at 2022-01-04 15:37:30</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>682</td>
                                                    <td>Login</td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">NK Enterprises sign in into RMS as vendor at 2022-01-04 15:37:05</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>683</td>
                                                    <td>Submit Auction                                                                                                        </td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">vendor Sanmitha Enterprises has negotiated quote with id #206 with 6 items at 2022-01-04 15:36:52</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>684</td>
                                                    <td>Submit Auction                                                                                                        </td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">vendor Sanmitha Enterprises has submitted quote with id #206 with 6 items at 2022-01-04 15:36:34</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>685</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2022-01-04 15:35:54</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>686</td>
                                                    <td>Invitation Reverse Auction                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has sent Reverse Auction Invitation with id #206 at 2022-01-04 15:35:41</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>687</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-01-04 15:35:23</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>688</td>
                                                    <td>Login</td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">NK Enterprises sign in into RMS as vendor at 2022-01-04 15:35:06</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>689</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2022-01-04 15:34:30</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>690</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-01-04 15:33:54</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>691</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-01-04 15:25:27</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>692</td>
                                                    <td>Reverse Auction                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has floated reverse Auction with id #1 with 6 items at 2022-01-04 15:25:05</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>693</td>
                                                    <td>Reverse Auction                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has created Reverse Auction with id #206 with 6 items at 2022-01-04 15:24:41</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>694</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2022-01-04 15:23:19</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>695</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2021-12-30 11:40:25</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>696</td>
                                                    <td>Send Invitation</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has sent invitation to sanmitha@vendorglobe.com including  in CC at 2021-12-29 11:16:06</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>697</td>
                                                    <td>Send Invitation</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has sent invitation to vinupras@gmail.com including  in CC at 2021-12-29 11:10:52</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>698</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2021-12-29 11:10:19</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>699</td>
                                                    <td>Allotment Request                                                                                                        </td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has sent allotment request to nanda@vendorglobe.com (Auto Approval by system) with quotation id #205 at 2021-12-29 11:06:02</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>700</td>
                                                    <td>Submit Auction                                                                                                        </td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">vendor NK Enterprises has submitted quote with id #205 with 1 items at 2021-12-29 11:00:05</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>701</td>
                                                    <td>Login</td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">NK Enterprises sign in into RMS as vendor at 2021-12-29 10:59:54</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>702</td>
                                                    <td>Submit Auction                                                                                                        </td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">vendor Sanmitha Enterprises has submitted quote with id #205 with 1 items at 2021-12-29 10:59:46</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>703</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2021-12-29 10:59:36</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>704</td>
                                                    <td>Invitation Forward Auction                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has sent Forward Auction Invitation with id #205 at 2021-12-29 10:59:28</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>705</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2021-12-29 10:59:16</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>706</td>
                                                    <td>Login</td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">NK Enterprises sign in into RMS as vendor at 2021-12-29 10:58:59</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>707</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2021-12-29 10:58:44</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>708</td>
                                                    <td>Forward Auction                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has created Forward Auction with id #205 with 1 items at 2021-12-29 10:58:34</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>709</td>
                                                    <td>Allotment Request                                                                                                        </td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has sent allotment request to nanda@vendorglobe.com (Auto Approval by system) with quotation id #204 at 2021-12-29 10:52:02</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>710</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2021-12-29 10:44:25</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>711</td>
                                                    <td>Submit Auction                                                                                                        </td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">vendor NK Enterprises has submitted quote with id #204 with 1 items at 2021-12-29 10:44:05</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>712</td>
                                                    <td>Login</td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">NK Enterprises sign in into RMS as vendor at 2021-12-29 10:43:40</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>713</td>
                                                    <td>Submit Auction                                                                                                        </td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">vendor Sanmitha Enterprises has submitted quote with id #204 with 1 items at 2021-12-29 10:43:32</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>714</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2021-12-29 10:43:16</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>715</td>
                                                    <td>Invitation Reverse Auction                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has sent Reverse Auction Invitation with id #204 at 2021-12-29 10:43:04</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>716</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2021-12-29 10:42:47</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>717</td>
                                                    <td>Login</td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">NK Enterprises sign in into RMS as vendor at 2021-12-29 10:42:20</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>718</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2021-12-29 10:42:00</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>719</td>
                                                    <td>Login</td>
                                                    <td>Nanda Kumar</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Nanda Kumar sign in into RMS as buyer at 2021-12-29 10:41:44</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>720</td>
                                                    <td>Reverse Auction                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has created Reverse Auction with id #204 with 1 items at 2021-12-29 10:41:34</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>721</td>
                                                    <td>Send Invitation</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has sent invitation to nanda@vendorglobe.com including  in CC at 2021-12-29 10:26:06</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>722</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2021-12-29 10:25:29</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>723</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2021-12-29 10:24:14</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>724</td>
                                                    <td>Allotment Request                                                                                                        </td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has sent allotment request to nanda@vendorglobe.com, sanmithakeshav@gmail.com (Auto Approval by system) with quotation id #203 at 2021-12-28 17:03:02</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>725</td>
                                                    <td>Submit Auction                                                                                                        </td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">vendor NK Enterprises has submitted quote with id #203 with 1 items at 2021-12-28 16:58:45</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>726</td>
                                                    <td>Login</td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">NK Enterprises sign in into RMS as vendor at 2021-12-28 16:58:22</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>727</td>
                                                    <td>Submit Auction                                                                                                        </td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">vendor Sanmitha Enterprises has negotiated quote with id #203 with 1 items at 2021-12-28 16:58:01</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>728</td>
                                                    <td>Submit Auction                                                                                                        </td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">vendor Sanmitha Enterprises has submitted quote with id #203 with 1 items at 2021-12-28 16:57:51</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>729</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2021-12-28 16:57:34</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>730</td>
                                                    <td>Invitation Reverse Auction                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has sent Reverse Auction Invitation with id #203 at 2021-12-28 16:57:26</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>731</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2021-12-28 16:57:14</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>732</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2021-12-28 16:56:52</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>733</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2021-12-28 16:56:00</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>734</td>
                                                    <td>Login</td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">NK Enterprises sign in into RMS as vendor at 2021-12-28 16:55:40</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>735</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2021-12-28 16:55:20</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>736</td>
                                                    <td>Reverse Auction                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has created Reverse Auction with id #203 with 1 items at 2021-12-28 16:51:10</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>737</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2021-12-28 16:48:39</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>738</td>
                                                    <td>Auto Cancel FA</td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has auto cancelled Forward Auction with Id #199 due to no replies before expiry date at 2021-12-24 12:49:01</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>739</td>
                                                    <td>Auto Cancel FA</td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has auto cancelled Forward Auction with Id #200 due to no replies before expiry date at 2021-12-24 12:49:01</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>740</td>
                                                    <td>Auto Cancel FA</td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has auto cancelled Forward Auction with Id #201 due to no replies before expiry date at 2021-12-24 12:49:01</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>741</td>
                                                    <td>Auto Cancel FA</td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has auto cancelled Forward Auction with Id #202 due to no replies before expiry date at 2021-12-24 12:00:01</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>742</td>
                                                    <td>Forward Auction                                                                                                        </td>
                                                    <td>Vinu</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Vinu has created Forward Auction with id #202 with 1 items at 2021-12-24 11:57:07</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>743</td>
                                                    <td>Forward Auction                                                                                                        </td>
                                                    <td>Vinu</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Vinu has created Forward Auction with id #201 with 1 items at 2021-12-24 11:51:22</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>744</td>
                                                    <td>Forward Auction                                                                                                        </td>
                                                    <td>Vinu</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Vinu has created Forward Auction with id #200 with 1 items at 2021-12-24 11:50:00</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>745</td>
                                                    <td>Forward Auction                                                                                                        </td>
                                                    <td>Vinu</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Vinu has created Forward Auction with id #199 with 1 items at 2021-12-24 11:49:21</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>746</td>
                                                    <td>Login</td>
                                                    <td>Vinu</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Vinu sign in into RMS as buyer at 2021-12-24 11:48:08</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>747</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2021-12-24 10:43:47</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>748</td>
                                                    <td>Auto Cancel FA</td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has auto cancelled Forward Auction with Id #198 due to no replies before expiry date at 2021-12-24 10:43:01</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>749</td>
                                                    <td>Forward Auction                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has created Forward Auction with id #198 with 1 items at 2021-12-24 10:39:01</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>750</td>
                                                    <td>Auto Cancel RA</td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has auto cancelled Reverse Auction with Id #197 due to no replies before expiry date at 2021-12-24 10:36:01</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>751</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2021-12-24 10:32:30</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>752</td>
                                                    <td>Login</td>
                                                    <td>Nanda Kumar</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Nanda Kumar sign in into RMS as buyer at 2021-12-24 10:30:37</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>753</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2021-12-24 10:28:07</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>754</td>
                                                    <td>Login</td>
                                                    <td>Nanda Kumar</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Nanda Kumar sign in into RMS as buyer at 2021-12-24 10:27:37</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>755</td>
                                                    <td>Reverse Auction                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has created Reverse Auction with id #197 with 1 items at 2021-12-24 10:26:10</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>756</td>
                                                    <td>Auto Cancel RA</td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has auto cancelled Reverse Auction with Id #196 due to no replies before expiry date at 2021-12-24 10:11:01</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>757</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2021-12-24 10:07:05</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>758</td>
                                                    <td>Login</td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">NK Enterprises sign in into RMS as vendor at 2021-12-24 10:03:53</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>759</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2021-12-24 10:02:41</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>760</td>
                                                    <td>Reverse Auction                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has created Reverse Auction with id #196 with 1 items at 2021-12-24 10:02:31</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>761</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2021-12-24 09:58:43</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>762</td>
                                                    <td>Auto Cancel RA</td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has auto cancelled Reverse Auction with Id #195 due to no replies before expiry date at 2021-12-23 11:52:01</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>763</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2021-12-23 11:39:45</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>764</td>
                                                    <td>Reverse Auction                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has created Reverse Auction with id #195 with 1 items at 2021-12-23 11:39:22</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>765</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2021-12-23 11:38:09</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>766</td>
                                                    <td>Auto Cancel FA</td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has auto cancelled Forward Auction with Id #194 due to no replies before expiry date at 2021-12-23 11:36:01</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>767</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2021-12-23 11:33:27</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>768</td>
                                                    <td>Login</td>
                                                    <td>Nanda Kumar</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Nanda Kumar sign in into RMS as buyer at 2021-12-23 11:32:05</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>769</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2021-12-23 11:30:50</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>770</td>
                                                    <td>Invitation Forward Auction                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has sent Forward Auction Invitation with id #194 at 2021-12-23 11:30:42</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>771</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2021-12-23 11:30:31</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>772</td>
                                                    <td>Login</td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">NK Enterprises sign in into RMS as vendor at 2021-12-23 11:30:15</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>773</td>
                                                    <td>Allotment Request                                                                                                        </td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has sent allotment request to nanda@vendorglobe.com (Auto Approval by system) with quotation id #193 at 2021-12-23 11:29:02</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>774</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2021-12-23 11:28:10</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>775</td>
                                                    <td>Forward Auction                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has created Forward Auction with id #194 with 6 items at 2021-12-23 11:27:54</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>776</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2021-12-23 11:26:50</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>777</td>
                                                    <td>Login</td>
                                                    <td>Nanda Kumar</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Nanda Kumar sign in into RMS as buyer at 2021-12-23 11:24:19</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>778</td>
                                                    <td>Submit Auction                                                                                                        </td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">vendor NK Enterprises has negotiated quote with id #193 with 6 items at 2021-12-23 11:20:56</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>779</td>
                                                    <td>Submit Auction                                                                                                        </td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">vendor NK Enterprises has submitted quote with id #193 with 6 items at 2021-12-23 11:20:36</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>780</td>
                                                    <td>Login</td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">NK Enterprises sign in into RMS as vendor at 2021-12-23 11:20:11</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>781</td>
                                                    <td>Submit Auction                                                                                                        </td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">vendor Sanmitha Enterprises has negotiated quote with id #193 with 6 items at 2021-12-23 11:19:54</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>782</td>
                                                    <td>Submit Auction                                                                                                        </td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">vendor Sanmitha Enterprises has submitted quote with id #193 with 6 items at 2021-12-23 11:19:41</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>783</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2021-12-23 11:19:09</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>784</td>
                                                    <td>Login</td>
                                                    <td>Nanda Kumar</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Nanda Kumar sign in into RMS as buyer at 2021-12-23 11:16:57</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>785</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2021-12-23 11:16:33</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>786</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2021-12-23 11:15:44</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>787</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2021-12-23 11:15:25</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>788</td>
                                                    <td>Invitation Reverse Auction                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has sent Reverse Auction Invitation with id #193 at 2021-12-23 11:15:18</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>789</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2021-12-23 11:14:19</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>790</td>
                                                    <td>Login</td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">NK Enterprises sign in into RMS as vendor at 2021-12-23 11:14:02</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>791</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2021-12-23 11:13:12</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>792</td>
                                                    <td>Reverse Auction                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has created Reverse Auction with id #193 with 6 items at 2021-12-23 11:12:51</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>793</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2021-12-23 11:08:57</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>794</td>
                                                    <td>Allotment Request                                                                                                        </td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has sent allotment request to nanda@vendorglobe.com (Auto Approval by system) with quotation id #192 at 2021-12-22 14:52:01</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>795</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2021-12-22 13:55:32</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>796</td>
                                                    <td>Submit Quote                                                                                                        </td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">vendor Sanmitha Enterprises has submitted quote with id #192 with 1 items at 2021-12-22 13:53:54</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>797</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2021-12-22 13:53:36</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>798</td>
                                                    <td>Invitation Reverse Auction                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has sent Reverse Auction Invitation with id #192 at 2021-12-22 13:53:24</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>799</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2021-12-22 13:53:12</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>800</td>
                                                    <td>Login</td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">NK Enterprises sign in into RMS as vendor at 2021-12-22 13:52:45</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>801</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2021-12-22 13:52:02</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>802</td>
                                                    <td>Reverse Auction                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has created Reverse Auction with id #192 with 1 items at 2021-12-22 13:51:51</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>803</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2021-12-22 13:50:16</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>804</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2021-12-22 13:49:45</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>805</td>
                                                    <td>Reverse Auction                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has floated reverse Auction with id #1 with 1 items at 2021-12-22 13:49:34</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>806</td>
                                                    <td>Allotment Request                                                                                                        </td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has sent allotment request to anandkumar.singam@gmail.com (Auto Approval by system) with quotation id #154 at 2021-12-22 13:49:05</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>807</td>
                                                    <td>Allotment Request                                                                                                        </td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has sent allotment request to nanda@vendorglobe.com (Auto Approval by system) with quotation id #155 at 2021-12-22 13:49:05</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>808</td>
                                                    <td>Allotment Request                                                                                                        </td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has sent allotment request to nanda@vendorglobe.com (Auto Approval by system) with quotation id #156 at 2021-12-22 13:49:05</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>809</td>
                                                    <td>Allotment Request                                                                                                        </td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has sent allotment request to chettysanmitha@gmail.com (Auto Approval by system) with quotation id #157 at 2021-12-22 13:49:05</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>810</td>
                                                    <td>Allotment Request                                                                                                        </td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has sent allotment request to chettysanmitha@gmail.com (Auto Approval by system) with quotation id #161 at 2021-12-22 13:49:05</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>811</td>
                                                    <td>Allotment Request                                                                                                        </td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has sent allotment request to chettysanmitha@gmail.com (Auto Approval by system) with quotation id #162 at 2021-12-22 13:49:04</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>812</td>
                                                    <td>Allotment Request                                                                                                        </td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has sent allotment request to Akash.Sharma2@larsentoubro.com, Muttaqi.Ahmed@larsentoubro.com (Auto Approval by system) with quotation id #165 at 2021-12-22 13:49:04</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>813</td>
                                                    <td>Allotment Request                                                                                                        </td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has sent allotment request to anandkumar.singam@gmail.com (Auto Approval by system) with quotation id #153 at 2021-12-22 13:49:04</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>814</td>
                                                    <td>Allotment Request                                                                                                        </td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has sent allotment request to Akash.Sharma2@larsentoubro.com, Muttaqi.Ahmed@larsentoubro.com (Auto Approval by system) with quotation id #166 at 2021-12-22 13:49:04</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>815</td>
                                                    <td>Allotment Request                                                                                                        </td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has sent allotment request to chettysanmitha@gmail.com (Auto Approval by system) with quotation id #158 at 2021-12-22 13:49:04</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>816</td>
                                                    <td>Allotment Request                                                                                                        </td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has sent allotment request to nanda@vendorglobe.com (Auto Approval by system) with quotation id #171 at 2021-12-22 13:49:04</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>817</td>
                                                    <td>Allotment Request                                                                                                        </td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has sent allotment request to nanda@vendorglobe.com (Auto Approval by system) with quotation id #173 at 2021-12-22 13:49:04</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>818</td>
                                                    <td>Allotment Request                                                                                                        </td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has sent allotment request to nanda@vendorglobe.com (Auto Approval by system) with quotation id #160 at 2021-12-22 13:49:04</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>819</td>
                                                    <td>Allotment Request                                                                                                        </td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has sent allotment request to nanda@vendorglobe.com (Auto Approval by system) with quotation id #163 at 2021-12-22 13:49:03</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>820</td>
                                                    <td>Allotment Request                                                                                                        </td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has sent allotment request to nanda@vendorglobe.com (Auto Approval by system) with quotation id #174 at 2021-12-22 13:49:03</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>821</td>
                                                    <td>Allotment Request                                                                                                        </td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has sent allotment request to Akash.Sharma2@larsentoubro.com, Muttaqi.Ahmed@larsentoubro.com (Auto Approval by system) with quotation id #164 at 2021-12-22 13:49:03</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>822</td>
                                                    <td>Allotment Request                                                                                                        </td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has sent allotment request to nanda@vendorglobe.com (Auto Approval by system) with quotation id #175 at 2021-12-22 13:49:03</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>823</td>
                                                    <td>Allotment Request                                                                                                        </td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has sent allotment request to nanda@vendorglobe.com (Auto Approval by system) with quotation id #167 at 2021-12-22 13:49:03</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>824</td>
                                                    <td>Allotment Request                                                                                                        </td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has sent allotment request to nanda@vendorglobe.com (Auto Approval by system) with quotation id #178 at 2021-12-22 13:49:03</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>825</td>
                                                    <td>Allotment Request                                                                                                        </td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has sent allotment request to nanda@vendorglobe.com (Auto Approval by system) with quotation id #168 at 2021-12-22 13:49:03</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>826</td>
                                                    <td>Allotment Request                                                                                                        </td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has sent allotment request to nanda@vendorglobe.com (Auto Approval by system) with quotation id #169 at 2021-12-22 13:49:03</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>827</td>
                                                    <td>Allotment Request                                                                                                        </td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has sent allotment request to nanda@vendorglobe.com (Auto Approval by system) with quotation id #179 at 2021-12-22 13:49:02</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>828</td>
                                                    <td>Allotment Request                                                                                                        </td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has sent allotment request to nanda@vendorglobe.com (Auto Approval by system) with quotation id #176 at 2021-12-22 13:49:02</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>829</td>
                                                    <td>Allotment Request                                                                                                        </td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has sent allotment request to nanda@vendorglobe.com (Auto Approval by system) with quotation id #180 at 2021-12-22 13:49:02</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>830</td>
                                                    <td>Allotment Request                                                                                                        </td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has sent allotment request to nanda@vendorglobe.com (Auto Approval by system) with quotation id #177 at 2021-12-22 13:49:02</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>831</td>
                                                    <td>Allotment Request                                                                                                        </td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has sent allotment request to Akash.Sharma2@larsentoubro.com, nanda@vendorglobe.com, prasad.haridas@larsentoubro.com (Auto Approval by system) with quotation id #181 at 2021-12-22 13:49:02</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>832</td>
                                                    <td>Allotment Request                                                                                                        </td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has sent allotment request to nanda@vendorglobe.com (Auto Approval by system) with quotation id #182 at 2021-12-22 13:49:02</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>833</td>
                                                    <td>Allotment Request                                                                                                        </td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has sent allotment request to nanda@vendorglobe.com (Auto Approval by system) with quotation id #185 at 2021-12-22 13:49:02</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>834</td>
                                                    <td>Allotment Request                                                                                                        </td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has sent allotment request to nanda@vendorglobe.com (Auto Approval by system) with quotation id #183 at 2021-12-22 13:49:02</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>835</td>
                                                    <td>Allotment Request                                                                                                        </td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has sent allotment request to nanda@vendorglobe.com (Auto Approval by system) with quotation id #188 at 2021-12-22 13:49:02</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>836</td>
                                                    <td>Auto Cancel FA</td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has auto cancelled Forward Auction with Id #184 due to no replies before expiry date at 2021-12-22 13:49:01</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>837</td>
                                                    <td>Allotment Request                                                                                                        </td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has sent allotment request to nanda@vendorglobe.com (Auto Approval by system) with quotation id #189 at 2021-12-22 13:49:01</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>838</td>
                                                    <td>Auto Cancel FA</td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has auto cancelled Forward Auction with Id #186 due to no replies before expiry date at 2021-12-22 13:49:01</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>839</td>
                                                    <td>Auto Cancel FA</td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has auto cancelled Forward Auction with Id #187 due to no replies before expiry date at 2021-12-22 13:49:01</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>840</td>
                                                    <td>Allotment Request                                                                                                        </td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has sent allotment request to nanda@vendorglobe.com (Auto Approval by system) with quotation id #190 at 2021-12-22 13:49:01</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>841</td>
                                                    <td>Allotment Request                                                                                                        </td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has sent allotment request to anandkumar.singam@gmail.com (Auto Approval by system) with quotation id #154 at 2021-12-22 13:47:06</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>842</td>
                                                    <td>Allotment Request                                                                                                        </td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has sent allotment request to nanda@vendorglobe.com (Auto Approval by system) with quotation id #155 at 2021-12-22 13:47:06</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>843</td>
                                                    <td>Allotment Request                                                                                                        </td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has sent allotment request to nanda@vendorglobe.com (Auto Approval by system) with quotation id #156 at 2021-12-22 13:47:06</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>844</td>
                                                    <td>Allotment Request                                                                                                        </td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has sent allotment request to chettysanmitha@gmail.com (Auto Approval by system) with quotation id #157 at 2021-12-22 13:47:06</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>845</td>
                                                    <td>Allotment Request                                                                                                        </td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has sent allotment request to chettysanmitha@gmail.com (Auto Approval by system) with quotation id #161 at 2021-12-22 13:47:05</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>846</td>
                                                    <td>Allotment Request                                                                                                        </td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has sent allotment request to chettysanmitha@gmail.com (Auto Approval by system) with quotation id #162 at 2021-12-22 13:47:05</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>847</td>
                                                    <td>Allotment Request                                                                                                        </td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has sent allotment request to Akash.Sharma2@larsentoubro.com, Muttaqi.Ahmed@larsentoubro.com (Auto Approval by system) with quotation id #165 at 2021-12-22 13:47:05</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>848</td>
                                                    <td>Allotment Request                                                                                                        </td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has sent allotment request to Akash.Sharma2@larsentoubro.com, Muttaqi.Ahmed@larsentoubro.com (Auto Approval by system) with quotation id #166 at 2021-12-22 13:47:05</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>849</td>
                                                    <td>Allotment Request                                                                                                        </td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has sent allotment request to anandkumar.singam@gmail.com (Auto Approval by system) with quotation id #153 at 2021-12-22 13:47:05</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>850</td>
                                                    <td>Allotment Request                                                                                                        </td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has sent allotment request to nanda@vendorglobe.com (Auto Approval by system) with quotation id #171 at 2021-12-22 13:47:04</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>851</td>
                                                    <td>Allotment Request                                                                                                        </td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has sent allotment request to nanda@vendorglobe.com (Auto Approval by system) with quotation id #173 at 2021-12-22 13:47:04</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>852</td>
                                                    <td>Allotment Request                                                                                                        </td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has sent allotment request to chettysanmitha@gmail.com (Auto Approval by system) with quotation id #158 at 2021-12-22 13:47:04</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>853</td>
                                                    <td>Allotment Request                                                                                                        </td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has sent allotment request to nanda@vendorglobe.com (Auto Approval by system) with quotation id #160 at 2021-12-22 13:47:04</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>854</td>
                                                    <td>Allotment Request                                                                                                        </td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has sent allotment request to nanda@vendorglobe.com (Auto Approval by system) with quotation id #174 at 2021-12-22 13:47:04</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>855</td>
                                                    <td>Allotment Request                                                                                                        </td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has sent allotment request to nanda@vendorglobe.com (Auto Approval by system) with quotation id #163 at 2021-12-22 13:47:04</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>856</td>
                                                    <td>Allotment Request                                                                                                        </td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has sent allotment request to nanda@vendorglobe.com (Auto Approval by system) with quotation id #175 at 2021-12-22 13:47:04</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>857</td>
                                                    <td>Allotment Request                                                                                                        </td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has sent allotment request to Akash.Sharma2@larsentoubro.com, Muttaqi.Ahmed@larsentoubro.com (Auto Approval by system) with quotation id #164 at 2021-12-22 13:47:04</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>858</td>
                                                    <td>Allotment Request                                                                                                        </td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has sent allotment request to nanda@vendorglobe.com (Auto Approval by system) with quotation id #178 at 2021-12-22 13:47:03</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>859</td>
                                                    <td>Allotment Request                                                                                                        </td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has sent allotment request to nanda@vendorglobe.com (Auto Approval by system) with quotation id #167 at 2021-12-22 13:47:03</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>860</td>
                                                    <td>Allotment Request                                                                                                        </td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has sent allotment request to nanda@vendorglobe.com (Auto Approval by system) with quotation id #168 at 2021-12-22 13:47:03</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>861</td>
                                                    <td>Allotment Request                                                                                                        </td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has sent allotment request to nanda@vendorglobe.com (Auto Approval by system) with quotation id #179 at 2021-12-22 13:47:03</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>862</td>
                                                    <td>Allotment Request                                                                                                        </td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has sent allotment request to nanda@vendorglobe.com (Auto Approval by system) with quotation id #169 at 2021-12-22 13:47:03</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>863</td>
                                                    <td>Allotment Request                                                                                                        </td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has sent allotment request to nanda@vendorglobe.com (Auto Approval by system) with quotation id #180 at 2021-12-22 13:47:03</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>864</td>
                                                    <td>Allotment Request                                                                                                        </td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has sent allotment request to nanda@vendorglobe.com (Auto Approval by system) with quotation id #176 at 2021-12-22 13:47:03</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>865</td>
                                                    <td>Allotment Request                                                                                                        </td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has sent allotment request to Akash.Sharma2@larsentoubro.com, nanda@vendorglobe.com, prasad.haridas@larsentoubro.com (Auto Approval by system) with quotation id #181 at 2021-12-22 13:47:03</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>866</td>
                                                    <td>Allotment Request                                                                                                        </td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has sent allotment request to nanda@vendorglobe.com (Auto Approval by system) with quotation id #177 at 2021-12-22 13:47:02</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>867</td>
                                                    <td>Allotment Request                                                                                                        </td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has sent allotment request to nanda@vendorglobe.com (Auto Approval by system) with quotation id #185 at 2021-12-22 13:47:02</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>868</td>
                                                    <td>Allotment Request                                                                                                        </td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has sent allotment request to nanda@vendorglobe.com (Auto Approval by system) with quotation id #182 at 2021-12-22 13:47:02</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>869</td>
                                                    <td>Allotment Request                                                                                                        </td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has sent allotment request to nanda@vendorglobe.com (Auto Approval by system) with quotation id #188 at 2021-12-22 13:47:02</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>870</td>
                                                    <td>Allotment Request                                                                                                        </td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has sent allotment request to nanda@vendorglobe.com (Auto Approval by system) with quotation id #189 at 2021-12-22 13:47:02</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>871</td>
                                                    <td>Allotment Request                                                                                                        </td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has sent allotment request to nanda@vendorglobe.com (Auto Approval by system) with quotation id #183 at 2021-12-22 13:47:02</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>872</td>
                                                    <td>Auto Cancel FA</td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has auto cancelled Forward Auction with Id #184 due to no replies before expiry date at 2021-12-22 13:47:02</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>873</td>
                                                    <td>Allotment Request                                                                                                        </td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has sent allotment request to nanda@vendorglobe.com (Auto Approval by system) with quotation id #190 at 2021-12-22 13:47:02</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>874</td>
                                                    <td>Auto Cancel FA</td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has auto cancelled Forward Auction with Id #186 due to no replies before expiry date at 2021-12-22 13:47:02</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>875</td>
                                                    <td>Allotment Request                                                                                                        </td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has sent allotment request to nanda@vendorglobe.com (Auto Approval by system) with quotation id #191 at 2021-12-22 13:47:01</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>876</td>
                                                    <td>Auto Cancel FA</td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has auto cancelled Forward Auction with Id #187 due to no replies before expiry date at 2021-12-22 13:47:01</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>877</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2021-12-22 13:45:35</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>878</td>
                                                    <td>Login</td>
                                                    <td>Singam Anand Kumar</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Singam Anand Kumar sign in into RMS as buyer at 2021-12-22 13:44:45</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>879</td>
                                                    <td>Login</td>
                                                    <td>Nanda Kumar</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Nanda Kumar sign in into RMS as buyer at 2021-12-22 13:39:50</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>880</td>
                                                    <td>Allotment Request                                                                                                        </td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has sent allotment request to nanda@vendorglobe.com (Auto Approval by system) with quotation id #191 at 2021-12-22 13:18:02</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>881</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2021-12-22 13:11:33</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>882</td>
                                                    <td>Submit Quote                                                                                                        </td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">vendor NK Enterprises has submitted quote with id #191 with 1 items at 2021-12-22 13:11:11</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>883</td>
                                                    <td>Login</td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">NK Enterprises sign in into RMS as vendor at 2021-12-22 13:10:54</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>884</td>
                                                    <td>Submit Quote                                                                                                        </td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">vendor Sanmitha Enterprises has submitted quote with id #191 with 1 items at 2021-12-22 13:10:39</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>885</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2021-12-22 13:10:27</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>886</td>
                                                    <td>Invitation Reverse Auction                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has sent Reverse Auction Invitation with id #191 at 2021-12-22 13:10:16</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>887</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2021-12-22 13:10:05</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>888</td>
                                                    <td>Login</td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">NK Enterprises sign in into RMS as vendor at 2021-12-22 13:09:47</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>889</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2021-12-22 13:09:30</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>890</td>
                                                    <td>Reverse Auction                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has created Reverse Auction with id #191 with 1 items at 2021-12-22 13:09:15</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>891</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2021-12-22 13:06:50</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>892</td>
                                                    <td>Login</td>
                                                    <td>Nanda Kumar</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Nanda Kumar sign in into RMS as buyer at 2021-12-22 13:06:15</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>893</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2021-12-22 13:02:07</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>894</td>
                                                    <td>Allotment Request                                                                                                        </td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has sent allotment request to nanda@vendorglobe.com (Auto Approval by system) with quotation id #190 at 2021-12-21 17:01:02</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>895</td>
                                                    <td>Login</td>
                                                    <td>Nanda Kumar</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Nanda Kumar sign in into RMS as buyer at 2021-12-21 17:00:53</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>896</td>
                                                    <td>Negotiate Quote                                                                                                        </td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">vendor NK Enterprises has negotiated quote with id #190 with 6 items at 2021-12-21 16:54:12</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>897</td>
                                                    <td>Auto Cancel RA</td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has auto cancelled Reverse Auction with Id #189 due to no replies before expiry date at 2021-12-21 16:54:02</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>898</td>
                                                    <td>Login</td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">NK Enterprises sign in into RMS as vendor at 2021-12-21 16:53:36</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>899</td>
                                                    <td>Login</td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">NK Enterprises sign in into RMS as vendor at 2021-12-21 16:52:34</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>900</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2021-12-21 16:51:59</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>901</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2021-12-21 16:51:06</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>902</td>
                                                    <td>Login</td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">NK Enterprises sign in into RMS as vendor at 2021-12-21 16:50:49</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>903</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2021-12-21 16:50:16</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>904</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2021-12-21 16:49:21</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>905</td>
                                                    <td>Login</td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">NK Enterprises sign in into RMS as vendor at 2021-12-21 16:49:05</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>906</td>
                                                    <td>Submit Quote                                                                                                        </td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">vendor NK Enterprises has submitted quote with id #190 with 6 items at 2021-12-21 16:48:30</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>907</td>
                                                    <td>Login</td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">NK Enterprises sign in into RMS as vendor at 2021-12-21 16:47:54</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>908</td>
                                                    <td>Submit Quote                                                                                                        </td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">vendor Sanmitha Enterprises has submitted quote with id #190 with 6 items at 2021-12-21 16:47:32</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>909</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2021-12-21 16:47:13</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>910</td>
                                                    <td>Invitation Reverse Auction                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has sent Reverse Auction Invitation with id #190 at 2021-12-21 16:46:58</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>911</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2021-12-21 16:46:43</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>912</td>
                                                    <td>Login</td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">NK Enterprises sign in into RMS as vendor at 2021-12-21 16:46:26</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>913</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2021-12-21 16:46:07</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>914</td>
                                                    <td>Reverse Auction                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has created Reverse Auction with id #190 with 6 items at 2021-12-21 16:44:54</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>915</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2021-12-21 16:43:38</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>916</td>
                                                    <td>Login</td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">NK Enterprises sign in into RMS as vendor at 2021-12-21 16:43:22</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>917</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2021-12-21 16:42:56</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>918</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2021-12-21 16:42:19</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>919</td>
                                                    <td>Login</td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">NK Enterprises sign in into RMS as vendor at 2021-12-21 16:42:02</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>920</td>
                                                    <td>Invitation Reverse Auction                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has sent Reverse Auction Invitation with id #189 at 2021-12-21 16:41:20</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>921</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2021-12-21 16:40:49</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>922</td>
                                                    <td>Login</td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">NK Enterprises sign in into RMS as vendor at 2021-12-21 16:40:28</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>923</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2021-12-21 16:39:56</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>924</td>
                                                    <td>Reverse Auction                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has created Reverse Auction with id #189 with 6 items at 2021-12-21 16:39:38</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>925</td>
                                                    <td>Update Vendor</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Vendor Sanmitha Enterprises's profile has been updated by buyer Sanmitha at 2021-12-21 16:32:34</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>926</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2021-12-21 16:28:45</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>927</td>
                                                    <td>Allotment Request                                                                                                        </td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has sent allotment request to nanda@vendorglobe.com (Auto Approval by system) with quotation id #188 at 2021-12-21 16:21:01</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>928</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2021-12-21 16:12:14</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>929</td>
                                                    <td>Submit Quote                                                                                                        </td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">vendor NK Enterprises has submitted quote with id #188 with 6 items at 2021-12-21 16:11:50</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>930</td>
                                                    <td>Login</td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">NK Enterprises sign in into RMS as vendor at 2021-12-21 16:11:05</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>931</td>
                                                    <td>Submit Quote                                                                                                        </td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">vendor Sanmitha Enterprises has submitted quote with id #188 with 6 items at 2021-12-21 16:10:26</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>932</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2021-12-21 16:09:58</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>933</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2021-12-21 16:09:40</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>934</td>
                                                    <td>Invitation Reverse Auction                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has sent Reverse Auction Invitation with id #188 at 2021-12-21 16:09:29</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>935</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2021-12-21 16:06:56</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>936</td>
                                                    <td>Login</td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">NK Enterprises sign in into RMS as vendor at 2021-12-21 16:03:31</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>937</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2021-12-21 16:03:01</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>938</td>
                                                    <td>Reverse Auction                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has created Reverse Auction with id #188 with 6 items at 2021-12-21 16:02:48</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>939</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2021-12-21 16:01:39</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>940</td>
                                                    <td>Login</td>
                                                    <td>Singam Anand Kumar</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Singam Anand Kumar sign in into RMS as buyer at 2021-12-21 15:24:30</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>941</td>
                                                    <td>Auto Cancel FA</td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has auto cancelled Forward Auction with Id #187 due to no replies before expiry date at 2021-12-21 14:31:01</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>942</td>
                                                    <td>Edit Vendor                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has added new vendors with Id's nsuresh@gmail.com with quotation id #187 at 2021-12-21 14:21:06</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>943</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2021-12-21 14:20:45</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>944</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2021-12-21 14:19:15</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>945</td>
                                                    <td>Forward Auction                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has created Forward Auction with id #187 with 1 items at 2021-12-21 14:19:03</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>946</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2021-12-21 14:17:50</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>947</td>
                                                    <td>Send Invitation</td>
                                                    <td>Nanda Kumar</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Nanda Kumar has sent invitation to sanmithakeshav@gmail.com including  in CC at 2021-12-20 12:25:43</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>948</td>
                                                    <td>Update Vendor</td>
                                                    <td>Nanda Kumar</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Vendor NSK Enterprises's profile has been updated by buyer Nanda Kumar at 2021-12-20 12:25:08</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>949</td>
                                                    <td>Update Vendor</td>
                                                    <td>Nanda Kumar</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Vendor NK Enterprises's profile has been updated by buyer Nanda Kumar at 2021-12-20 12:04:33</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>950</td>
                                                    <td>Update Vendor</td>
                                                    <td>Nanda Kumar</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Vendor Sanmitha Enterprises's profile has been updated by buyer Nanda Kumar at 2021-12-20 12:04:17</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>951</td>
                                                    <td>Login</td>
                                                    <td>Nanda Kumar</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Nanda Kumar sign in into RMS as buyer at 2021-12-20 11:59:21</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>952</td>
                                                    <td>Auto Cancel FA</td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has auto cancelled Forward Auction with Id #186 due to no replies before expiry date at 2021-12-20 11:58:01</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>953</td>
                                                    <td>Allotment Request                                                                                                        </td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has sent allotment request to nanda@vendorglobe.com (Auto Approval by system) with quotation id #185 at 2021-12-20 11:56:01</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>954</td>
                                                    <td>Edit Vendor                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has added new vendors with Id's sanmithakeshav@gmail.com with quotation id #186 at 2021-12-20 11:53:56</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>955</td>
                                                    <td>Forward Auction                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has created Forward Auction with id #186 with 6 items at 2021-12-20 11:53:43</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>956</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2021-12-20 11:52:18</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>957</td>
                                                    <td>Submit Quote                                                                                                        </td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">vendor NK Enterprises has submitted quote with id #185 with 6 items at 2021-12-20 11:51:23</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>958</td>
                                                    <td>Login</td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">NK Enterprises sign in into RMS as vendor at 2021-12-20 11:50:51</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>959</td>
                                                    <td>Negotiate Quote                                                                                                        </td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">vendor Sanmitha Enterprises has negotiated quote with id #185 with 6 items at 2021-12-20 11:49:07</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>960</td>
                                                    <td>Submit Quote                                                                                                        </td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">vendor Sanmitha Enterprises has submitted quote with id #185 with 6 items at 2021-12-20 11:48:43</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>961</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2021-12-20 11:46:33</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>962</td>
                                                    <td>Invitation Reverse Auction                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has sent Reverse Auction Invitation with id #185 at 2021-12-20 11:46:10</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>963</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2021-12-20 11:45:45</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>964</td>
                                                    <td>Login</td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">NK Enterprises sign in into RMS as vendor at 2021-12-20 11:45:08</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>965</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2021-12-20 11:44:18</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>966</td>
                                                    <td>Reverse Auction                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has floated reverse Auction with id #1 with 6 items at 2021-12-20 11:44:06</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>967</td>
                                                    <td>Reverse Auction                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has created Reverse Auction with id #185 with 6 items at 2021-12-20 11:43:37</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>968</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2021-12-20 11:38:56</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>969</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2021-12-17 13:05:50</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>970</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2021-12-15 11:20:48</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>971</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2021-12-15 11:16:56</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>972</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2021-12-15 11:16:13</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>973</td>
                                                    <td>Auto Cancel FA</td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has auto cancelled Forward Auction with Id #184 due to no replies before expiry date at 2021-12-14 16:09:01</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>974</td>
                                                    <td>Edit Vendor                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has added new vendors with Id's sanmithakeshav@gmail.com with quotation id #184 at 2021-12-14 16:01:50</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>975</td>
                                                    <td>Forward Auction                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has created Forward Auction with id #184 with 1 items at 2021-12-14 16:00:49</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>976</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2021-12-14 15:59:21</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>977</td>
                                                    <td>Allotment Request                                                                                                        </td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has sent allotment request to nanda@vendorglobe.com (Auto Approval by system) with quotation id #183 at 2021-12-13 12:54:01</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>978</td>
                                                    <td>Login</td>
                                                    <td>Nanda Kumar</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Nanda Kumar sign in into RMS as buyer at 2021-12-13 12:49:28</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>979</td>
                                                    <td>Negotiate Quote                                                                                                        </td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">vendor NK Enterprises has negotiated quote with id #183 with 1 items at 2021-12-13 12:48:49</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>980</td>
                                                    <td>Login</td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">NK Enterprises sign in into RMS as vendor at 2021-12-13 12:48:36</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>981</td>
                                                    <td>Negotiate Quote                                                                                                        </td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">vendor Sanmitha Enterprises has negotiated quote with id #183 with 1 items at 2021-12-13 12:48:22</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>982</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2021-12-13 12:48:06</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>983</td>
                                                    <td>Submit Quote                                                                                                        </td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">vendor NK Enterprises has submitted quote with id #183 with 1 items at 2021-12-13 12:46:26</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>984</td>
                                                    <td>Login</td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">NK Enterprises sign in into RMS as vendor at 2021-12-13 12:46:10</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>985</td>
                                                    <td>Submit Quote                                                                                                        </td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">vendor Sanmitha Enterprises has submitted quote with id #183 with 1 items at 2021-12-13 12:45:23</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>986</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2021-12-13 12:45:04</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>987</td>
                                                    <td>Invitation Forward Auction                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has sent Forward Auction Invitation with id #183 at 2021-12-13 12:44:56</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>988</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2021-12-13 12:44:46</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>989</td>
                                                    <td>Login</td>
                                                    <td>NK Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">NK Enterprises sign in into RMS as vendor at 2021-12-13 12:44:33</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>990</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2021-12-13 12:44:18</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>991</td>
                                                    <td>Forward Auction                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has created Forward Auction with id #183 with 1 items at 2021-12-13 12:44:09</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>992</td>
                                                    <td>Auto Cancel FA</td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has auto cancelled Forward Auction with Id #182 due to no replies before expiry date at 2021-12-13 12:43:01</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>993</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2021-12-13 12:42:50</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>994</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2021-12-13 12:42:33</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>995</td>
                                                    <td>Forward Auction                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has created Forward Auction with id #182 with 1 items at 2021-12-13 12:42:24</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>996</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2021-12-13 12:35:20</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>997</td>
                                                    <td>Auto Cancel RA</td>
                                                    <td>System</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">System has auto cancelled Reverse Auction with Id #181 due to no replies before expiry date at 2021-12-13 12:34:01</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>998</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha Enterprises</td>
                                                    <td>vendor</td>
                                                    <td style="max-width: 600px;">Sanmitha Enterprises sign in into RMS as vendor at 2021-12-13 12:27:37</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>999</td>
                                                    <td>Invitation Reverse Auction                                                                                                        </td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha has sent Reverse Auction Invitation with id #181 at 2021-12-13 12:26:59</td>
                                                </tr>
                                                <tr style="margin-right: 20px;">
                                                    <td>1000</td>
                                                    <td>Login</td>
                                                    <td>Sanmitha</td>
                                                    <td>buyer</td>
                                                    <td style="max-width: 600px;">Sanmitha sign in into RMS as buyer at 2021-12-13 12:26:50</td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>			
                    </section>
                    <!-- /.content -->
                </div>
            </div>
            <!-- /.content-wrapper -->
            <?php $this->load->view('buyer/partials/footer'); ?>

            <!-- Control Sidebar -->
            <?php $this->load->view('buyer/partials/control'); ?>
            <!-- /.control-sidebar -->

            <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
            <div class="control-sidebar-bg"></div>

        </div>
        <!-- ./wrapper -->

        <?php $this->load->view('buyer/partials/scripts'); ?>

    </body>
</html>