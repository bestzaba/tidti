<!DOCTYPE html>
<html lang="en">
<?=header_url()?>
</html>
<body>
<div class="contain col-xs-12 nopad">
    <div class="login user-page col-md-offset-2 col-xs-12 col-sm-12 col-md-8 nopad">
        <div class="_1 col-xs-12 col-sm-4">
            <div class="head">
                <h2 class="thaisans">นักศึกษา</h2>
            </div>
            <div class="content thaisans">
<?php //print_r($rad_test)?>
                <div class="name"><?=prefix_name_id($this->session->userdata('prefix_name_id'))?> <?= $this->session->userdata('firstname')?> <?= $this->session->userdata('lastname')?></div>
                <div class="epassport">รหัส <?= $this->session->userdata('id')?></div>
                 <?php //fac_id($this->session->userdata('fac_id'))?>
                <div class="faculty">คณะ <?=$this->session->userdata('fac')?></div>
                <?php //program_id($this->session->userdata('program_id'))?>
                <div class="major">สาขา <?=$this->session->userdata('program')?></div>
                <div class="major">สาขา <?=$this->session->userdata('citizen_id')?></div>
                <div class="email">อีเมลล์ <?=$this->session->userdata('email')?></div>
                <div class="tel">โทร <?=$this->session->userdata('tel')?></div>
                <a href="student/signout" class="signout"><i class="fa fa-sign-out" title="ออกจากระบบ" aria-hidden="true"></i>&nbspออกจากระบบ</a>
            </div>
            <div class="footer">
                <h2 class="thaisans">มีปัญหาติดต่อ งานวิศวกรรมเครือข่าย <br>สำนักวิทยบริการฯ</h2>
                <p><i class="fa fa-phone" aria-hidden="true"></i> : 074-317100 ต่อ 1911 - 1912 </p>
                <p> <i class="fa fa-envelope-o" aria-hidden="true"></i> : noc@rmutsv.ac.th</p>
            </div>
        </div>
        <div class="_2 col-xs-12 col-sm-8">

            <div class="form col-xs-12 col-sm-offset-1 col-sm-10 col-md-offset-1 col-md-10">
                <div class="head">
                    <h2 class="thaisans bold">อุปกรณ์ / Device</h2>
                </div>
                <div class="sub-head">
                    <h2 class="thaisans">ลงทะเบียน mac-address เพื่อรับสัญญาณ Internet</h2>
                </div>

                <!-- //////////////////////////////////////////////////////////// -->
                <!-- ////////////            alert                  ////////////// -->
                <div class="alert">
                    <div class="user_alert">
                        <h2 class="thaisans"></h2>
                    </div>
                </div>
                <div class="content col-xs-10">
                        <div class="add-device">
                            <!--<div class="alert">alert</div>-->
<?php
if(!$this->session->userdata('location') ){
?>
<div class="alert alert-danger" role="alert">** กรุณากรอกข้อมูลวิทยาเขตก่อนกรอก Mac Address **

                            <h3 class="thaisans bold">วิทยาเขต</h3>
                            <?php if($this->session->userdata('location')){?>
                            <h3><?=$this->session->userdata('location')?></h3>
                            <?php }?>

                            <form method="post" action="student/submitlocation">
                                <select name="location">
                                    <option value="sk">สงขลา</option>
                                    <option value="sai">ไสใหญ่</option>
                                    <option value="tho">ทุ่งใหญ่</option>
                                    <option value="ka">ขนอม</option>
                                    <option value="tr">ตรัง</option>
                                    <option value="rat">วิทยาลัยรัตภูมิ</option>
                                </select>
                                <button type="submit">ตกลง</button>
                            </form>
                            </div>

<?php
}else{
?>
    <div class="alert alert-success" role="alert">วิทยาเขต <?php

    switch ($this->session->userdata('location')) {
        case 'sk':
            echo "สงขลา";
            break;
        case 'sai':
            echo "ไสใหญ่";
            break;
        case 'tho':
            echo "ทุ่งใหญ่";
            break;
        case 'ka':
            echo "ขนอม";
            break;
        case 'tr':
            echo "ตรัง";
            break;
        case 'rat':
            echo "วิทยาลัยรัตภูมิ";
            break;

    }

    ?></div>


<?php
}
?>

                             <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#myModal">
                                  วิธีดู Mac address
                                </button>
                            <!--/////////////////////////////////////////////////////////////////////////-->

                                <h3 class="thaisans bold">คอมพิวเตอร์/โน็ตบุ๊ค</h3>

                            <?php
                                $data_exists = false;
                                //var_dump($mac_data);
                                foreach($mac_data as $data){
                                    if($data->device=='Notebook')
                                    {
                                        $data_exists = true;
                                        break;
                                    }
                                }
                                if($data_exists){
                            ?>

                                <form method="POST" action="student/deletemac" onsubmit="return confirm('Are you sure you want to submit this form?');">
                                    <div class="ch-device activated">
                                        <input type="text" class="text opensans" disabled name="" value="<?=$data->macaddress?>" id="">
                                        <button class="button"><i class="fa fa-trash-o"></i></button>
                                        <label for="laptop" class="laptop"><i class="fa fa-laptop active"></i></label>
                                    </div>
                                    <input type="hidden" name="del" value="<?=$data->macaddress?>">
                                </form>

                            <?php
                                }else{
                            ?>

                                <form id="mac_submit" method="POST" action="student/addmac">
                                  <div class="ch-device ">
                                      <input type="text" class="text opensans" placeholder="mac-address" name="mac" id="">
                                      <button class="button" type="submit"><i class="fa fa-plus-square-o"></i></button>
                                      <label for="laptop" class="laptop"><i class="fa fa-laptop"></i></label>
                                  </div>
                                  <input type="hidden" name="device" value="Notebook">
                                </form>

                            <?php
                                }

                            ?>

                            <!--/////////////////////////////////////////////////////////////////////////-->

                                <h3 class="thaisans bold">โทรศัพท์</h3>

                            <?php
                            $data_exists = false;
                            foreach($mac_data as $data){
                                if($data->device=='Phone')
                                {
                                    $data_exists = true;
                                    break;
                                }
                            }
                                if($data_exists){
                            ?>

                                <form method="POST" action="student/deletemac" onsubmit="return confirm('Are you sure you want to submit this form?');">
                                    <div class="ch-device activated">
                                        <input type="text" class="text opensans" disabled name="" value="<?=$data->macaddress?>" id="">
                                        <button class="button"><i class="fa fa-trash-o"></i></button>
                                        <label for="mobile" class="mobile"><i class="fa fa-mobile active"></i></label>
                                    </div>
                                    <input type="hidden" name="del" value="<?=$data->macaddress?>">
                                </form>

                            <?php

                                }else{
                            ?>

                                <form id="mac_submit" method="POST" action="student/addmac">
                                  <div class="ch-device ">
                                      <input type="text" class="text opensans" name="mac" placeholder="mac-address" id="">
                                      <button class="button" type="submit"><i class="fa fa-plus-square-o"></i></button>
                                      <label for="mobile" class="mobile"><i class="fa fa-mobile"></i></label>
                                  </div>
                                  <input type="hidden" name="device" value="Phone">
                                </form>

                            <?php
                                }

                            ?>

                                <!--<form method="POST">
                                  <div class="ch-device ">
                                      <input type="text" class="text opensans" name="mac_mobile" placeholder="mac-address" id="">
                                      <button class="button" type="submit"><i class="fa fa-plus-square-o"></i></button>
                                      <label for="mobile"><i class="fa fa-mobile"></i></label>
                                  </div>
                                </form>-->

                            <!--/////////////////////////////////////////////////////////////////////////-->

                                <h3 class="thaisans bold">แท็ปเล็ต</h3>

                            <?php
                                    $data_exists = false;
                            foreach($mac_data as $data){
                                if($data->device=='Tablet')
                                {
                                    $data_exists = true;
                                    $data_mac = $data->macaddress;
                                    break;
                                }
                            }
                                if($data_exists){
                            ?>

                                <form method="POST" action="student/deletemac" onsubmit="return confirm('Are you sure you want to submit this form?');">
                                    <div class="ch-device activated">
                                        <input type="text" class="text opensans" disabled name="" value="<?=$data->macaddress?>" id="">
                                        <button class="button"><i class="fa fa-trash-o"></i></button>
                                        <label for="tablet" class="tablet"><i class="fa fa-tablet active"></i></label>
                                    </div>
                                    <input type="hidden" name="del" value="<?=$data->macaddress?>">
                                </form>

                            <?php
                                }else{
                            ?>

                                <form id="mac_submit" method="POST" action="student/addmac">
                                  <div class="ch-device ">
                                      <input type="text" class="text opensans" name="mac" placeholder="mac-address" id="">
                                      <button class="button" type="submit"><i class="fa fa-plus-square-o"></i></button>
                                      <label for="tablet" class="tablet"><i class="fa fa-tablet"></i></label>
                                  </div>
                                  <input type="hidden" name="device" value="Tablet">
                                </form>
                            <?php
                                }
                            ?>



                        <!-- Modal -->
                        <div class="modal fade my-modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                          <div class="modal-dialog my-modal-content" role="document">
                            <div class="modal-content  my-modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title thaisans" style="font-size: 2.2em" id="myModalLabel">วิธีดู Mac address</h4>
                              </div>
                              <div class="modal-body">
                                <div class="my-modal-text">
                                    <h2>IOS</h2>
                                    <div>
                                    <p>ไปที่ "Settings" -> "General" -> "About" แล้วเลื่อนลงมา MAC address คือ "Wi-Fi Address"</p>
                                    <div class="img"><img src="<?=asset_url()?>/pic/mac_ios.png" align="middle" width="60%" height="60%"></div>
                                    </div>
                                </div>
                                <br>
                                <div class="my-modal-text">
                                    <h2>Android</h2>
                                    <div>
                                    <p>ไปที่ "Settings" -> "About phone" -> "Status" แล้วเลื่อนลงมา MAC address คือ "Wi-Fi MAC Address"</p>
                                    <div class="img"><img src="<?=asset_url()?>/pic/mac_android.png" width="60%" height="60%"></div>
                                    </div>
                                </div>
                                <br>
                                <div class="my-modal-text">
                                    <h2>Windows Phone</h2>
                                    <div>
                                    <p>ไปที่ "Settings" -> "about" -> "more info" </p>
                                    <div class="img"><img src="<?=asset_url()?>/pic/mac_wp.jpg" width="60%" height="60%"></div>
                                    </div>
                                </div>
                                <br>
                                <div class="my-modal-text">
                                    <h2>BlackBerry</h2>
                                    <div>
                                    <p>1. ไปที่ Options</p>
                                    <div class="img"><img src="<?=asset_url()?>/pic/mac_bb1.jpg" width="60%" height="60%"></div>
                                    <p>2. เลื่อนลงไปเลือก Status </p>
                                    <div class="img"><img src="<?=asset_url()?>/pic/mac_bb2.jpg" width="60%" height="60%"></div>
                                    <p>3. เลื่อนลงไปดูที่ WLAN MAC</p>
                                    <div class="img"><img src="<?=asset_url()?>/pic/mac_bb3.jpg" width="60%" height="60%"></div>
                                    </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        </div>

                    </div>


        </div>


    </div>
</div>
</body>
</html>

