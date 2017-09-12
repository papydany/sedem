<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->  
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->  
 <html lang="en"> 
<head>
 <link href="{{URL::to('panel/css/bootstrap.min.css')}}" rel="stylesheet" media="all">
  <title>@yield('title')</title> 
</head> 
<style type="text/css">
@media print {

.w2{width: 500px;float: left;clear:all;}
.text-center{text-align: center;}


</style>
<body class="home-page">

    <div class="row" style="margin-right: 0px; margin-left: 0px;">
    <div class="col-xs-12" style="padding-top: 10px;padding-bottom:10px;">
    
<div class="col-sm-12">
    <h4 class="text-center" ><b >SEDEM PHARMATICEUTICAL NIG LTD</b></h4>
  


  </div>
  </div>
  
 @yield('content')
 
 </div><!--//wrapper-->
    
 
   

 </body>


</html>             
