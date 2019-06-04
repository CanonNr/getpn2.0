<?php
use yii\helpers\Html;
#dd($provinceArray);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="title" content="ScoopThemes">
    <meta name="ROBOTS" content="">
    <meta name="description" content="">
    <meta name="abstract" content="">
    <title>手机号定向抓取</title>
    <?=Html::cssFile('@web/static/assets/css/bootstrap.css')?>
    <?=Html::cssFile('@web/static/assets/css/font-awesome.css')?>
    <?=Html::cssFile('@web/static/assets/css/bootstrap-theme.css')?>
    <?=Html::cssFile('@web/static/assets/css/animations.css')?>
    <?=Html::cssFile('@web/static/assets/css/style.css')?>
</head>

<body>
<div id="particles-js"></div>
<div class="cloud floating">
    <img src="./static/assets/img/cloud.png" alt="Scoop Themes">
</div>

<div class="cloud pos1 fliped floating">
    <img src="./static/assets/img/cloud.png" alt="Scoop Themes">
</div>

<div class="cloud pos2 floating">
    <img src="./static/assets/img/cloud.png" alt="Scoop Themes">
</div>

<div class="cloud pos3 fliped floating">
    <img src="./static/assets/img/cloud.png" alt="Scoop Themes">
</div>


<div id="wrapper">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <br/>
                <br/>
                <h2 class="subtitle">电话号码全国抓取</h2>
                <p class="copyright">可按地区、行业搜索，非爬虫，无需维护，数据自动更新，电销利器</p>
                <br/>
                <br/>
                <form class="form-inline validate signup" role="form">
                    <div class="form-group">
                        <div id="province-box" class="input-group">
                            <select id="province" class="form-control" style="width: 180px">
                                <?php
                                    foreach ($provinceArray as $key=>$province){
                                        echo "<option value='{$province['REGION_ID']}'>{$province['REGION_NAME']}</option>";
                                    }
                                ?>
                            </select>
                        </div>
                        <br/>
                        <div id="city-box"  >
                            <select id="city" class="form-control" style="width: 180px">
                                <?php
                                    foreach ($cityArray as $key=>$city){
                                        echo "<option value='{$city['REGION_CODE']}'>{$city['REGION_NAME']}</option>";
                                    }
                                ?>
                            </select>
                        </div>
                        <br/>
                        <div id="type-box"  >
                            <select id="type" class="form-control" style="width: 180px">
                                <?php
                                    foreach ($typeArray as $key=>$type){
                                        echo "<option value='{$type['newtype']}'>{$type['name']}</option>";
                                    }
                                ?>
                            </select>
                        </div>
                        <br/>
                        <div id="hy-box"  >
                            <select id="hy" class="form-control" style="width: 180px">
                                <option value='null'>查询所有</option>
                                <?php
                                    foreach ($hyArray as $key=>$hy){
                                        echo "<option value='{$hy['newtype']}'>{$hy['name']}</option>";
                                    }
                                ?>
                            </select>
                        </div>
                        <br/>
                        <input type="submit" value="GO!" id="submit" class="btn btn-theme" style="width: 180px" >
                    </div>
                </form>
                <br/>
            </div>
            <div class="col-sm-12 align-center">
                <ul class="social-network social-circle">
                    <li><a href="#" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a>
                    </li>
                    <li><a href="#" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a>
                    </li>
                    <li><a href="#" class="icoGit" title="Github"><i class="fa fa-github"></i></a>
                    </li>
                    <li><a href="#" class="icoLinkedin" title="Linkedin"><i class="fa fa-linkedin"></i></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
            </div>
        </div>
    </div>
</div>


<script src="./static/assets/js/jquery-1.8.3.min.js"></script>
<script src="./static/assets/js/jquery.form-n-validate.js"></script>
<script>

    $(document).ready( function () {
        $('#wrapper').height($(document).height());
    });



    $('#province').click(function () {
        var provinceId=$(this).children('option:selected').val();
        $.ajax({
            type: 'GET',
            url:'<?= \yii\helpers\Url::to(['home/getcity']) ?>',
            data: {
                id:provinceId
            },
            success: function(data) {
                $('#city').empty();
                data = JSON.parse(data);
                data = data.data;
                for (var i = 0; i < data.length; i++) {
                    $("#city").append("<option value='"+data[i]['REGION_CODE']+"'>"+data[i]['REGION_NAME']+"</option>")
                }
            }
        });
    });

    $('#type').click(function () {
        var typeId=$(this).children('option:selected').val();
        $.ajax({
            type: 'GET',
            url:'<?= \yii\helpers\Url::to(['home/gethy']) ?>',
            data: {
                id:typeId
            },
            success: function(data) {
                $('#hy').empty();
                $("#hy").append("<option value=''>查询所有</option>");
                data = JSON.parse(data);
                data = data.data;
                for (var i = 0; i < data.length; i++) {
                    $("#hy").append("<option value='"+data[i]['newtype']+"'>"+data[i]['name']+"</option>")
                }
            }
        });
    })

    $('#submit').click(function (e) {
        e.preventDefault();
        var provinceId=$('#province').children('option:selected').val();
        var cityId=$('#city').children('option:selected').val();
        var typeId=$('#type').children('option:selected').val();
        var hyId=$('#hy').children('option:selected').val();
        var url = '<?= \yii\helpers\Url::to(['show/index']) ?>'+'&cityId='+cityId+'&typeId='+typeId+'&hyId='+hyId+'&page=1';
        window.location.href = url
    })
</script>

</body>
</html>