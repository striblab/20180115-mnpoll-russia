<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>MNPOLL</title>
  	<meta name="description" content="MNPOLL">
 	<meta name="author" content="Frey Hargarten - StarTribune">
	<meta name="generator" content="BBEdit 10.5" />

	<link href="../_common_resources/charts/nvd3-master/build/nv.d3.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="../_common_resources/styles/startribune_dataviz_styles.css" />

<style>
  body { font-family:"Benton Sans"; }

	.myButton2 { background-color:#ddd; width:13%; }
	.myButton2:hover { background-color:#5cbf2a !important; }
	.myButton2:active { background-color:#5cbf2a; }
	#chartBox { width:100%; }
	.chart svg { width:100%; height:50px; margin:5px; }
  .wrapper-dropdown-1 { width:100%; }
  .wrapper-demo { width:100%; }
  .filterBreak { height:7px; border-bottom:1px solid #333; clear:both; }

  text { font-family:"Benton Sans" !important; }
  .nv-axisMaxMin { font-family:"Popular" !important; }
  .category { font-weight:900; font-family:"Benton Sans"; font-size:1.5em; text-align:center; margin-bottom:10px; }
  .question { font-family:"Poynter Serif RE"; font-size:1.3em; font-weight:900; }

  .card { padding:10px; border-bottom:1px solid #ddd; }
  .year { display:inline-block; width:15%; vertical-align:top; }

  .loadLink { color:steelblue !important; }
  .loadLink:hover { color:black !important; }

  #bigResults { text-align:center; width:100%; margin:20px; }
  .result { display:inline-block; text-align:center; margin:20px; width:20%; white-space:nowrap; }

  .icon img { width:100px; }
  .icon { text-align:center; }

  #selector { display:none; }

  .forNum { color:#2c3942; }
  .againstNum { color:#556e7f; }
/*  .nv-legendWrap { -ms-transform:translate(-100%,-30px); -webkit-transform:translate(-100%,-30px); transform:translate(-100%,-30px); }*/

  .bigNum { font-family:3em; font-family:"Popular" !important; text-align:center; font-weight:900; padding-top:15px; padding-left:15px; padding-right:15px; padding-bottom:5px; }

  #question { display:none; }

  @media (max-width:845px) {
  .result { display:inline-block; text-align:center; margin:0; width:48%; white-space:nowrap; }
  }
  @media (max-width:350px) {
   .nv-legendWrap { display:none !important; }
  }
   @media only screen and (min-device-width: 200px) and (max-device-width: 640px) {
 .bigNum { font-size:2.5em;}
 .forLabel,.againstLabel{font-size:.85em;white-space:normal;}
 #bigResults { text-align:center; width:100%; margin:0; }
 #wrapper{width:100%;}
 #primary_gop_0{height:313px;}
 #primary_gop_0 .nvd3.nv-wrap.nv-multiBarHorizontalChart{transform: translate(40px,172px);}
 }
  </style>
</head>
<body>

<div id="wrapper">


<div class="clearfix"></div>
<!-- <div id="menu">
<button id="all" class="myButton2">All</button>
<button id="party" class="myButton2">Party</button>
<button id="income" class="myButton2">Income</button>
<button id="region" class="myButton2">Region</button>
<button id="gender" class="myButton2">Gender</button>
<button id="age" class="myButton2">Age</button>
<button id="race" class="myButton2">Race</button>
</div> -->

<div id="question"></div>

<div id="bigResults">
<div class="result">
  <div class="bigNum forNum"><span class="for">0</span>%</div>
  <div class="stat forLabel">support</div>
</div>
<div class="result">
  <div class="bigNum againstNum"><span class="against">0</span>%</div>
  <div class="stat againstLabel">oppose</div>
</div>
</div>

<div id="chartBox">

</div>

<div id="selector">
  <section class="main">
        <div class="wrapper-demo">
          <div id="dd" class="wrapper-dropdown-1" tabindex="1">
            <span>Select poll</span>
              <ul class="dropdown race" tabindex="1">

              </ul>
          </div>
        ​</div>
</section>
</div>

</body>

<!--SCRIPTS-->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="http://d3js.org/d3.v3.min.js" charset="utf-8"></script>
<script src="../_common_resources/charts/nvd3-master/build/nv.d3.js"></script>
<script src="../_common_resources/charts/nvd3-master/src/utils.js"></script>
<script src="../_common_resources/charts/nvd3-master/src/tooltip.js"></script>
<script src="../_common_resources/charts/nvd3-master/src/models/legend.js"></script>
<script src="../_common_resources/charts/nvd3-master/src/models/axis.js"></script>
<script src="../_common_resources/charts/nvd3-master/test/stream_layers.js"></script>

<script>
// d3.json("https://script.googleusercontent.com/macros/echo?user_content_key=hPtDXdnlMWCnLBV-DQjTQvwfRVhXI9x0Aly_llEtoXzCD4PC4UwDDE_T-Y07MclwX1FVPOumJN_seQ4rw4tfdflREaZenGBnOJmA1Yb3SEsKFZqtv3DaNYcMrmhZHmUMWojr9NvTBuBLhyHCd5hHaxCoMjMSmZWLp6XAShvjQj50JtCfh4yP7n1RnEoDeOH7XqmOXgX8RYIyMAhIAtjnF9UDzNXGLr6Tb0U-14YGMBfk_OMYBYnswUTh6e76xg13EtP4QB9VkYZcReJD3bLlsgxpQyidp-ZAvl7IGsXAM8nfn9l0nyfDlg&lib=MVcLnEUipyThKZcpmQKyqT_CoSfd4egCX", function(error, json) {

<?php

$jsonData = file_get_contents("https://script.googleusercontent.com/macros/echo?user_content_key=hPtDXdnlMWCnLBV-DQjTQvwfRVhXI9x0Aly_llEtoXzCD4PC4UwDDE_T-Y07MclwX1FVPOumJN_seQ4rw4tfdflREaZenGBnOJmA1Yb3SEsKFZqtv3DaNYcMrmhZHmUMWojr9NvTBuBLhyHCd5hHaxCoMjMSmZWLp6XAShvjQj50JtCfh4yP7n1RnEoDeOH7XqmOXgX8RYIyMAhIAtjnF9UDzNXGLr6Tb0U-14YGMBfk_OMYBYnswUTh6e76xg13EtP4QB9VkYZcReJD3bLlsgxpQyidp-ZAvl7IGsXAM8nfn9l0nyfDlg&lib=MVcLnEUipyThKZcpmQKyqT_CoSfd4egCX");

?>

//THESE ADD THEM TO JAVASCRIPT VARIABLES WE CAN ACCESS THROUGHOUT THE DOCUMENT
var dataLoad = <?php echo $jsonData; ?>;

data = dataLoad.polls;

var url = window.location.href; 
var captured = /poll=([^&]+)/.exec(url)[1];
var poll = captured ? captured : 'test';

// data = json.polls;

//GENERATE POLL SELECTION MENU
var holder = "test";

d3.select(".dropdown").selectAll(".list")
.data(data).enter().append("div")
.attr("class","list")
.html(function (d){ 
  // console.log(holder);
  if (d.tag != holder) { holder = d.tag; return "<a href='index.html?poll='" + d.tag + " class='loadLink'><li class='card' data='" + d.tag + "''>" + d.year + " | " + d.question + "</li></a>"; }
});

$(document).ready(function() {
  $(".loadLink").each(function(){
    $(this).attr("href","index.html?poll=" + $(this).find("li").attr("data") + "");
});
  $(".loadLink").click(function(){

    window.location.href = $(this).attr("href");
  });
});

// redrawGraph = function(data) {

//     d3.select('#pie1 svg').datum(data).transition().duration(500).call(chart0);
//     nv.utils.windowResize(chart0.update);
// };

colors = ['#2c3942', '#556e7f', '#7f98aa', '#a8b9c5', '#c6d1d9', '#dae1e7'];

var tag = poll;

spillResults(tag,"#chartBox");

function spillResults(tag,section) {

    $(section).html("");
    askQuestion(tag,"#question")
  if (verifySections(tag,"Total") > 1) {  chartPolls(tag,"Total",section,0); }
  if (verifySections(tag,"Democrat") > 1 || verifySections(tag,"Republican") > 1) {  pinCategory("Party",section); }
  if (verifySections(tag,"Democrat") > 1) {  chartPolls(tag,"Democrat",section,1); }
  if (verifySections(tag,"Republican") > 1) {  chartPolls(tag,"Republican",section,2); }
  if (verifySections(tag,"Independent") > 1) {  chartPolls(tag,"Independent",section,3); }
  if (verifySections(tag,"Other/None") > 1) {  chartPolls(tag,"Other/None",section,4); }
  if (verifySections(tag,"Men") > 1) {  pinCategory("Gender",section); }
  if (verifySections(tag,"Men") > 1) {  chartPolls(tag,"Men",section,5); }
  if (verifySections(tag,"Women") > 1) {  chartPolls(tag,"Women",section,6); }
  if (verifySections(tag,"< $50,000") > 1) {  pinCategory("Income",section); }
  if (verifySections(tag,"< $50,000") > 1) {  chartPolls(tag,"< $50,000",section,7); }
  if (verifySections(tag,"> $50,000") > 1) {  chartPolls(tag,"> $50,000",section,8); }
  if (verifySections(tag,"Hennepin/Ramsey") > 1) {  pinCategory("Region",section); }
  if (verifySections(tag,"Hennepin/Ramsey") > 1) {  chartPolls(tag,"Hennepin/Ramsey",section,9); }
  if (verifySections(tag,"Metro Suburbs") > 1) {  chartPolls(tag,"Metro Suburbs",section,10); }
  if (verifySections(tag,"Rest of State") > 1) {  chartPolls(tag,"Rest of State",section,11); }
  if (verifySections(tag,"No. Minnesota") > 1) {  chartPolls(tag,"No. Minnesota",section,22); }
  if (verifySections(tag,"So. Minnesota") > 1) {  chartPolls(tag,"So. Minnesota",section,23); }
  if (verifySections(tag,"Age 18-34") > 1) {  pinCategory("Age",section); }
  if (verifySections(tag,"Age 18-34") > 1) {  chartPolls(tag,"Age 18-34",section,12); }
  if (verifySections(tag,"Age 35-49") > 1) {  chartPolls(tag,"Age 35-49",section,13); }
  if (verifySections(tag,"Age 50-64") > 1) {  chartPolls(tag,"Age 50-64",section,14); }
  if (verifySections(tag,"Age 65+") > 1) {  chartPolls(tag,"Age 65+",section,15); }
  if (verifySections(tag,"White") > 1) {  pinCategory("Race",section); }
  if (verifySections(tag,"White") > 1) {  chartPolls(tag,"White",section,16); }
  if (verifySections(tag,"Black") > 1) {  chartPolls(tag,"Black",section,17); }
  if (verifySections(tag,"Hispanic") > 1) {  chartPolls(tag,"Hispanic",section,18); }
  if (verifySections(tag,"Asian") > 1) {  chartPolls(tag,"Asian",section,19); }
  if (verifySections(tag,"Native") > 1) {  chartPolls(tag,"Native",section,20); }
  if (verifySections(tag,"Other") > 1) {  chartPolls(tag,"Other",section,21); }
  if (verifySections(tag,"Yes") > 1) {  pinCategory("Gun Ownership",section); }
  if (verifySections(tag,"Yes") > 1) {  chartPolls(tag,"Yes",section,24); }
  if (verifySections(tag,"No") > 1) {  chartPolls(tag,"No",section,25); }
    overview(tag);
}



function verifySections(tag,demographic){
    var count = d3.nest()
  .key(function(d) { return d.tag == tag && d.demographic == demographic; })
  .rollup(function(v) { return v.length; })
  .entries(data);

  var results = count; 

  return results.length;
}

function askQuestion(tag,section){
  for (i=0; i<data.length; i++){
    if (data[i].tag == tag && data[i].demographic == "main") {
      $(section).html("<div class='question'>" + data[i].question + "</div");
    }
  }
}

function pinCategory(cat,section){
      $(section).append("<div class='icon'><img src='img/" + cat.toLowerCase() + ".png' /></div><div class='category'>" + cat + "</div");
}

function chartPolls(tag,demographic,section,index) {
  var count = d3.nest()
  .key(function(d) { return d.tag == tag && d.demographic == demographic; })
  .entries(data);

  var resultsString = count[1].values[0];
  
  var boxID = tag + "_" + index;
  // $(section).append("<div class='demo' rel="  + demographic + ">" + demographic + "</div>");
  $(section).append("<div rel='"  + demographic + "' id='" + boxID + "'><svg></svg></div>");

  var chart;
nv.addGraph(function() {
  chart = nv.models.multiBarHorizontalChart()
      .x(function(d) { return d.label })
      .y(function(d) { return d.value })
      .margin({top: 30, right: 20, bottom: 50, left: 115})
      .color(colors)
      .stacked(true)
      .showValues(false)
      .showControls(false);

  chart.tooltip.enabled(true);

  chart.yAxis
      .tickFormat(d3.format('%'));

  d3.select('#' + boxID + ' svg')
      .datum(datatest)
    .transition().duration(500)
      .call(chart);

  nv.utils.windowResize(chart.update);

  var $doc = $(document);
  var centerX = $doc.width() / -2;

  // d3.selectAll(".nv-legendWrap").attr("transform","translate(" + centerX + ",-30)");

  return chart;
});

var $doc = $("#chartBox");
var centerX = $doc.width() / -2;

// d3.selectAll(".nv-legendWrap").attr("transform","translate(" + centerX + ",-30)");
if (resultsString.answer12 != "null"){
var datatest = [
  {
    "key": resultsString.answer1,
    "values": [
      { 
        "label" : demographic ,
        "value" : Number(resultsString.answer1_pct)
      }
    ]
  },
  {
    "key": resultsString.answer2,
    "values": [
      { 
        "label" : demographic ,
        "value" : Number(resultsString.answer2_pct)
      }
    ]
  },
  {
    "key": resultsString.answer3,
    "values": [
      { 
        "label" : demographic ,
        "value" : Number(resultsString.answer3_pct)
      }
    ]
  },
  {
    "key": resultsString.answer4,
    "values": [
      { 
        "label" : demographic ,
        "value" : Number(resultsString.answer4_pct)
      }
    ]
  },
  {
    "key": resultsString.answer5,
    "values": [
      { 
        "label" : demographic ,
        "value" : Number(resultsString.answer5_pct)
      }
    ]
  },
  {
    "key": resultsString.answer6,
    "values": [
      { 
        "label" : demographic ,
        "value" : Number(resultsString.answer6_pct)
      }
    ]
  },
  {
    "key": resultsString.answer7,
    "values": [
      { 
        "label" : demographic ,
        "value" : Number(resultsString.answer7_pct)
      }
    ]
  },
  {
    "key": resultsString.answer8,
    "values": [
      { 
        "label" : demographic ,
        "value" : Number(resultsString.answer8_pct)
      }
    ]
  },
  {
    "key": resultsString.answer9,
    "values": [
      { 
        "label" : demographic ,
        "value" : Number(resultsString.answer9_pct)
      }
    ]
  },
  {
    "key": resultsString.answer10,
    "values": [
      { 
        "label" : demographic ,
        "value" : Number(resultsString.answer10_pct)
      }
    ]
  },
  {
    "key": resultsString.answer11,
    "values": [
      { 
        "label" : demographic ,
        "value" : Number(resultsString.answer11_pct)
      }
    ]
  },
  {
    "key": resultsString.answer12,
    "values": [
      { 
        "label" : demographic ,
        "value" : Number(resultsString.answer12_pct)
      }
    ]
  }
]
}
else if (resultsString.answer11 != "null"){
var datatest = [
  {
    "key": resultsString.answer1,
    "values": [
      { 
        "label" : demographic ,
        "value" : Number(resultsString.answer1_pct)
      }
    ]
  },
  {
    "key": resultsString.answer2,
    "values": [
      { 
        "label" : demographic ,
        "value" : Number(resultsString.answer2_pct)
      }
    ]
  },
  {
    "key": resultsString.answer3,
    "values": [
      { 
        "label" : demographic ,
        "value" : Number(resultsString.answer3_pct)
      }
    ]
  },
  {
    "key": resultsString.answer4,
    "values": [
      { 
        "label" : demographic ,
        "value" : Number(resultsString.answer4_pct)
      }
    ]
  },
  {
    "key": resultsString.answer5,
    "values": [
      { 
        "label" : demographic ,
        "value" : Number(resultsString.answer5_pct)
      }
    ]
  },
  {
    "key": resultsString.answer6,
    "values": [
      { 
        "label" : demographic ,
        "value" : Number(resultsString.answer6_pct)
      }
    ]
  },
  {
    "key": resultsString.answer7,
    "values": [
      { 
        "label" : demographic ,
        "value" : Number(resultsString.answer7_pct)
      }
    ]
  },
  {
    "key": resultsString.answer8,
    "values": [
      { 
        "label" : demographic ,
        "value" : Number(resultsString.answer8_pct)
      }
    ]
  },
  {
    "key": resultsString.answer9,
    "values": [
      { 
        "label" : demographic ,
        "value" : Number(resultsString.answer9_pct)
      }
    ]
  },
  {
    "key": resultsString.answer10,
    "values": [
      { 
        "label" : demographic ,
        "value" : Number(resultsString.answer10_pct)
      }
    ]
  },
  {
    "key": resultsString.answer11,
    "values": [
      { 
        "label" : demographic ,
        "value" : Number(resultsString.answer11_pct)
      }
    ]
  }
]
}
else if (resultsString.answer10 != "null"){
var datatest = [
  {
    "key": resultsString.answer1,
    "values": [
      { 
        "label" : demographic ,
        "value" : Number(resultsString.answer1_pct)
      }
    ]
  },
  {
    "key": resultsString.answer2,
    "values": [
      { 
        "label" : demographic ,
        "value" : Number(resultsString.answer2_pct)
      }
    ]
  },
  {
    "key": resultsString.answer3,
    "values": [
      { 
        "label" : demographic ,
        "value" : Number(resultsString.answer3_pct)
      }
    ]
  },
  {
    "key": resultsString.answer4,
    "values": [
      { 
        "label" : demographic ,
        "value" : Number(resultsString.answer4_pct)
      }
    ]
  },
  {
    "key": resultsString.answer5,
    "values": [
      { 
        "label" : demographic ,
        "value" : Number(resultsString.answer5_pct)
      }
    ]
  },
  {
    "key": resultsString.answer6,
    "values": [
      { 
        "label" : demographic ,
        "value" : Number(resultsString.answer6_pct)
      }
    ]
  },
  {
    "key": resultsString.answer7,
    "values": [
      { 
        "label" : demographic ,
        "value" : Number(resultsString.answer7_pct)
      }
    ]
  },
  {
    "key": resultsString.answer8,
    "values": [
      { 
        "label" : demographic ,
        "value" : Number(resultsString.answer8_pct)
      }
    ]
  },
  {
    "key": resultsString.answer9,
    "values": [
      { 
        "label" : demographic ,
        "value" : Number(resultsString.answer9_pct)
      }
    ]
  },
  {
    "key": resultsString.answer10,
    "values": [
      { 
        "label" : demographic ,
        "value" : Number(resultsString.answer10_pct)
      }
    ]
  }
]
}
else if (resultsString.answer9 != "null"){
var datatest = [
  {
    "key": resultsString.answer1,
    "values": [
      { 
        "label" : demographic ,
        "value" : Number(resultsString.answer1_pct)
      }
    ]
  },
  {
    "key": resultsString.answer2,
    "values": [
      { 
        "label" : demographic ,
        "value" : Number(resultsString.answer2_pct)
      }
    ]
  },
  {
    "key": resultsString.answer3,
    "values": [
      { 
        "label" : demographic ,
        "value" : Number(resultsString.answer3_pct)
      }
    ]
  },
  {
    "key": resultsString.answer4,
    "values": [
      { 
        "label" : demographic ,
        "value" : Number(resultsString.answer4_pct)
      }
    ]
  },
  {
    "key": resultsString.answer5,
    "values": [
      { 
        "label" : demographic ,
        "value" : Number(resultsString.answer5_pct)
      }
    ]
  },
  {
    "key": resultsString.answer6,
    "values": [
      { 
        "label" : demographic ,
        "value" : Number(resultsString.answer6_pct)
      }
    ]
  },
  {
    "key": resultsString.answer7,
    "values": [
      { 
        "label" : demographic ,
        "value" : Number(resultsString.answer7_pct)
      }
    ]
  },
  {
    "key": resultsString.answer8,
    "values": [
      { 
        "label" : demographic ,
        "value" : Number(resultsString.answer8_pct)
      }
    ]
  },
  {
    "key": resultsString.answer9,
    "values": [
      { 
        "label" : demographic ,
        "value" : Number(resultsString.answer9_pct)
      }
    ]
  }
]
}
else if (resultsString.answer8 != "null"){
var datatest = [
  {
    "key": resultsString.answer1,
    "values": [
      { 
        "label" : demographic ,
        "value" : Number(resultsString.answer1_pct)
      }
    ]
  },
  {
    "key": resultsString.answer2,
    "values": [
      { 
        "label" : demographic ,
        "value" : Number(resultsString.answer2_pct)
      }
    ]
  },
  {
    "key": resultsString.answer3,
    "values": [
      { 
        "label" : demographic ,
        "value" : Number(resultsString.answer3_pct)
      }
    ]
  },
  {
    "key": resultsString.answer4,
    "values": [
      { 
        "label" : demographic ,
        "value" : Number(resultsString.answer4_pct)
      }
    ]
  },
  {
    "key": resultsString.answer5,
    "values": [
      { 
        "label" : demographic ,
        "value" : Number(resultsString.answer5_pct)
      }
    ]
  },
  {
    "key": resultsString.answer6,
    "values": [
      { 
        "label" : demographic ,
        "value" : Number(resultsString.answer6_pct)
      }
    ]
  },
  {
    "key": resultsString.answer7,
    "values": [
      { 
        "label" : demographic ,
        "value" : Number(resultsString.answer7_pct)
      }
    ]
  },
  {
    "key": resultsString.answer8,
    "values": [
      { 
        "label" : demographic ,
        "value" : Number(resultsString.answer8_pct)
      }
    ]
  }
]
}
else if (resultsString.answer7 != "null"){
var datatest = [
  {
    "key": resultsString.answer1,
    "values": [
      { 
        "label" : demographic ,
        "value" : Number(resultsString.answer1_pct)
      }
    ]
  },
  {
    "key": resultsString.answer2,
    "values": [
      { 
        "label" : demographic ,
        "value" : Number(resultsString.answer2_pct)
      }
    ]
  },
  {
    "key": resultsString.answer3,
    "values": [
      { 
        "label" : demographic ,
        "value" : Number(resultsString.answer3_pct)
      }
    ]
  },
  {
    "key": resultsString.answer4,
    "values": [
      { 
        "label" : demographic ,
        "value" : Number(resultsString.answer4_pct)
      }
    ]
  },
  {
    "key": resultsString.answer5,
    "values": [
      { 
        "label" : demographic ,
        "value" : Number(resultsString.answer5_pct)
      }
    ]
  },
  {
    "key": resultsString.answer6,
    "values": [
      { 
        "label" : demographic ,
        "value" : Number(resultsString.answer6_pct)
      }
    ]
  },
  {
    "key": resultsString.answer7,
    "values": [
      { 
        "label" : demographic ,
        "value" : Number(resultsString.answer7_pct)
      }
    ]
  }
]
}
else if (resultsString.answer6 != "null"){
var datatest = [
  {
    "key": resultsString.answer1,
    "values": [
      { 
        "label" : demographic ,
        "value" : Number(resultsString.answer1_pct)
      }
    ]
  },
  {
    "key": resultsString.answer2,
    "values": [
      { 
        "label" : demographic ,
        "value" : Number(resultsString.answer2_pct)
      }
    ]
  },
  {
    "key": resultsString.answer3,
    "values": [
      { 
        "label" : demographic ,
        "value" : Number(resultsString.answer3_pct)
      }
    ]
  },
  {
    "key": resultsString.answer4,
    "values": [
      { 
        "label" : demographic ,
        "value" : Number(resultsString.answer4_pct)
      }
    ]
  },
  {
    "key": resultsString.answer5,
    "values": [
      { 
        "label" : demographic ,
        "value" : Number(resultsString.answer5_pct)
      }
    ]
  },
  {
    "key": resultsString.answer6,
    "values": [
      { 
        "label" : demographic ,
        "value" : Number(resultsString.answer6_pct)
      }
    ]
  }
]
}
else if (resultsString.answer5 != "null"){
var datatest = [
  {
    "key": resultsString.answer1,
    "values": [
      { 
        "label" : demographic ,
        "value" : Number(resultsString.answer1_pct)
      }
    ]
  },
  {
    "key": resultsString.answer2,
    "values": [
      { 
        "label" : demographic ,
        "value" : Number(resultsString.answer2_pct)
      }
    ]
  },
  {
    "key": resultsString.answer3,
    "values": [
      { 
        "label" : demographic ,
        "value" : Number(resultsString.answer3_pct)
      }
    ]
  },
  {
    "key": resultsString.answer4,
    "values": [
      { 
        "label" : demographic ,
        "value" : Number(resultsString.answer4_pct)
      }
    ]
  },
  {
    "key": resultsString.answer5,
    "values": [
      { 
        "label" : demographic ,
        "value" : Number(resultsString.answer5_pct)
      }
    ]
  }
]
}
else if  (resultsString.answer4 != "null"){
var datatest = [
  {
    "key": resultsString.answer1,
    "values": [
      { 
        "label" : demographic ,
        "value" : Number(resultsString.answer1_pct)
      }
    ]
  },
  {
    "key": resultsString.answer2,
    "values": [
      { 
        "label" : demographic ,
        "value" : Number(resultsString.answer2_pct)
      }
    ]
  },
  {
    "key": resultsString.answer3,
    "values": [
      { 
        "label" : demographic ,
        "value" : Number(resultsString.answer3_pct)
      }
    ]
  },
  {
    "key": resultsString.answer4,
    "values": [
      { 
        "label" : demographic ,
        "value" : Number(resultsString.answer4_pct)
      }
    ]
  }
]
}

else {
var datatest = [
  {
    "key": resultsString.answer1,
    "values": [
      { 
        "label" : demographic ,
        "value" : Number(resultsString.answer1_pct)
      }
    ]
  },
  {
    "key": resultsString.answer2,
    "values": [
      { 
        "label" : demographic ,
        "value" : Number(resultsString.answer2_pct)
      }
    ]
  },
  {
    "key": resultsString.answer3,
    "values": [
      { 
        "label" : demographic ,
        "value" : Number(resultsString.answer3_pct)
      }
    ]
  }
]
}

}

function overview(tag){

// $(document).bind('DOMNodeInserted', function(event) {
// $(document).ready(function() {
//   $(".card").click(function() {
//    spillResults($(this).attr("data"),"#chartBox");
//   });

var forNum = 0;
var againstNum = 0;
var forLabel;
var againstLabel;

for (i=0; i<data.length; i++){
    if (data[i].tag == tag && data[i].demographic == "Total") {
      var forNum = Number(data[i].answer1_pct * 100);
      var againstNum = Number(data[i].answer2_pct * 100);
      forLabel = data[i].answer1;
      againstLabel = data[i].answer2;
    }
 }

$(".forLabel").html("said  " + forLabel);
$(".againstLabel").html("said " + againstLabel);

$({countNum: $('.for').text()}).animate({countNum: Math.round(forNum)}, {
  duration: 1000,
  easing:'linear',
  step: function() {
    $('.for').text(Math.floor(this.countNum));
  },
  complete: function() {
    $('.for').text(this.countNum);
  }
});

$({countNum: $('.for').text()}).animate({countNum: Math.round(againstNum)}, {
  duration: 1000,
  easing:'linear',
  step: function() {
    $('.against').text(Math.floor(this.countNum));
  },
  complete: function() {
    $('.against').text(this.countNum);
  }
});

// });
}

// });
</script>

<script type="text/javascript">
      function DropDown(el) {
        this.dd = el;
        this.placeholder = this.dd.children('span');
        this.opts = this.dd.find('ul.dropdown > li');
        this.val = '';
        this.index = -1;
        this.initEvents();
      }
      DropDown.prototype = {
        initEvents : function() {
          var obj = this;

          obj.dd.on('click', function(event){
            $(this).toggleClass('active');
            return false;
          });

          obj.opts.on('click',function(){
            var opt = $(this);
            obj.val = opt.text();
            obj.index = opt.index();
            obj.placeholder.text(obj.val);
          });
        },
        getValue : function() {
          return this.val;
        },
        getIndex : function() {
          return this.index;
        }
      }

      $(function() {

        var dd = new DropDown( $('#dd') );
        var dd2 = new DropDown( $('#ddY') );

        $(document).click(function() {
          // all dropdowns
          $('.wrapper-dropdown-1').removeClass('active');
        });

      });
</script>