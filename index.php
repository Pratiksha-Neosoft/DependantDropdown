<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <h1>Dependant dropdown Ajax with MYSQL</h1>
    <div class="container">
        <div class="form-group">
            <select class="form-control" id="country">
                <option value="">Country</option>
                <?php
                include("database.php");
                $sel=mysqli_query($conn,"select * from country");
                while($arr=mysqli_fetch_assoc($sel)){
                ?>
                <option value="<?=$arr['id']?>"><?=$arr['name'];?></option>
                <?php }?>
            </select>
        </div>
        <div class="form-group">
            <select class="form-control" id="state">
                <option value="">State</option>
                
            </select>
        </div>
        <div class="form-group">
            <select class="form-control" id="city">
                <option value="">City</option>

            </select>
        </div>
    

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            $(document).on("change","#country",function(){
                var countryId=$(this).val();
                if(countryId){
                    $.ajax({
                        type:"post",
                        url:'ajax.php',
                        data:{country_Id:countryId},
                        success:function(data){
                            $("#state").html(data);
                        }
                    })
                }
            })
            $(document).on("change","#state",function(){
                var stateId=$(this).val();
                if(stateId){
                    $.ajax({
                        type:"post",
                        url:'ajax.php',
                        data:{state_Id:stateId},
                        success:function(data){
                            $("#city").html(data);
                        }
                    })
                }
            })
        })
    </script>
</body>
</html>