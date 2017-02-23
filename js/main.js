//MAIN FUNCTION


//Button Listener	
	$(".btn.btn-default.pull-right").on("click", function(){
		$(this).fadeOut(300);
		$($(this).attr("data-target")).slideDown(300);
	});


//SWitch window by button function




//Validate url and achor to the page

//Show alert on class.php (as far)

	function dbTools($table, $method, $id){
		if ($table == "student") {
			$obj = "student";
		}else{
			$obj = "class";
		}
		if($method == "delete") {
			if($("."+$obj+"-tbody").load("response.php?removedataid="+$id+"&table="+$table)){
				$(".alert span").html($table+" With ID <strong># "+$id+"</strong> Was Successfully Removed");
				$(".alert-wrap").fadeIn(300);
				$(".alert").fadeIn(300);
			}

		}else if($method == "edit") {
			alert("tools unavailable !!");
		}else if ($method == "view") {
			alert("tools unavailable !!");
		}
		update_class_table(".class-tbody", "id");
		update_student_table(".student-tbody", "id");
	}




function switchWindow(anchor){
	var $anchor = " <i class='fa fa-caret-right'></i> ";
	$(".statbar .path").html("Cmlite "+$anchor+anchor.substr(1)+$anchor);
	if ($(".content").find(".active")) {
		$(".content").find(".active").fadeOut(300, function(){ 
			$(this).removeClass('active'); 
			$(anchor).fadeIn(300, function(){ $(this).addClass('active'); });
		});
	}
	
	$(".colapse-menu").find(".active").removeClass('active');
	$(".colapse-menu").find("li[data-name='"+anchor.substr(1)+"']").addClass('active');	
}

//NEW FIXED METHOD



	$(window).on('load', function() {
		var url = window.location.href;
		var url = url.split('#');
		if (url.length == 2) {
			var location = url[1].split('?');
			switchWindow("#"+location[0]);
		}else{
			switchWindow("#dashboard");
		}
		update_class_table(".class-tbody", "id");
		update_student_table(".student-tbody", "id");
		$("#student-class").load("response.php?runfunc=listing_available_class");

	});



//Change Window

    $(window).bind( 'hashchange', function(e) { 
    		var anchor = document.location.hash;
            if( anchor === '#dashboard' || anchor === '#statistics' || anchor === '#class' || anchor === '#student' || anchor === '#message' ) {
            	switchWindow(anchor);
            }
    });

$("td.tool a").on("click", function(){
		var $method = $(this).attr("data-method");
		var $table = $(this).parent().attr("data-table");
		var $id = $(this).parent().attr("data-id");
		if ($method == "delete") {

		}else if ($method == "edit") {

		}
});





//Close Alert Listener
	
	$(".alert-wrap").on("click", function(){
		$(".alert-wrap").fadeOut(300);
		$(".alert").fadeOut(300);
	});

//Sort by table function

$(".table thead td[data-cname]").on("click", function(){
	update_class_table(".class-tbody", $(this).attr("data-cname"));
});	

$(".table thead td[data-stname]").on("click", function(){
	update_student_table(".student-tbody", $(this).attr("data-stname"));
});	

//Update Student Table
	function update_student_table($parent, $sort){
		var query = "select student.id, student.fullname, student.email, student.class_id, student.nisn, (select concat(class.class,' ', class.dept,' ', class.alphabeth ) from class where class.id = student.class_id) as class from student order by "+$sort+" ASC ";
		var fname = "request_data";
		$.ajax({
			type: 'GET',
			url: 'config/util.php?run='+fname+'&query='+query,
			dataType: 'json',
			success: function(personal_data){
				$($parent).empty();
				$.each(personal_data, function(i, data){$($parent).append( 
					"<tr>"+
						"<td>"+(i+1)+"</td>"+
						"<td>"+data[1]+"</td>"+
						"<td>"+data[5]+"</td>"+
						"<td>"+data[4]+"</td>"+
						"<td class='tool' data-table='student' data-id='"+data[0]+"'>"+
							"<a data-method='view'>View</a> | "+
							"<a data-method='edit'>Edit</a> | "+
							"<a data-method='delete'>Delete</a>"+
						"</td>"+
					"</tr>"
				);});
			}
		});
	}




	//Update Class Table
	function update_class_table($parent, $sort){
		var query = "select class.id, class.class, class.alphabeth, class.dept, class.years, (SELECT count(*) from student where student.class_id = class.id) as member from class ORDER BY "+$sort+" ASC";
		var fname = "request_data";
		$.ajax({
			type: 'GET',
			url: 'config/util.php?run='+fname+'&query='+query,
			dataType: 'json',
			success: function(personal_data){
				$($parent).empty();
				$.each(personal_data, function(i, data){$($parent).append(
					"<tr>"+
						"<td>"+(i+1)+"</td>"+
						"<td>"+data[1]+" "+data[2]+"</td>"+
						"<td>"+data[3]+"</td>"+
						"<td>"+data[4]+"</td>"+
						"<td>"+data[5]+"</td>"+
						"<td class='tool' data-table='' data-id='"+data[0]+"'>"+
							"<a data-method='view'>View</a> | "+
							"<a data-method='edit'>Edit</a> | "+
							"<a data-method='delete'>Delete</a>"+
						"</td>"+
					"</tr>"
				);});
			}
		});
	}






//CHART.JS CONFIG



function splitword($word){
	if ($word == "Rekayasa Perangkat Lunak") { return "RPL";} 
	else if($word == "Teknik Komputer dan Jaringan"){return "TKJ";}
	else if($word == "Kimia Industri"){return "KI";}
	else if($word == "Bisnis Management"){return "Bismen";}

}


var bgtmp = [[
	'rgba(54, 162, 235, 0.5)',
    'rgba(255, 206, 86, 0.5)',
    'rgba(255, 99, 132, 0.5)'
],
[
	'rgba(54, 162, 235, 0.5)',
    'rgba(255, 206, 86, 0.5)',
    'rgba(255, 99, 132, 0.5)'
]];

var $cc_value = [[],[0,0,0,0,0]],
$cc_label = [[],[]], 
$cc_color = [[[],[]]];



function update_chart_data(){
	var query = "select class.id, concat(class.class, ' ', class.dept, ' ', class.alphabeth, ' ', class.years) as class,  (SELECT count(*) from student where student.class_id = class.id) as member, class.dept from class ORDER BY class ASC";
	var fname = "request_data";
	$.ajax({
		type: 'GET',
		url : 'config/util.php?run='+fname+'&query='+query,
		dataType: 'json',
		success: function(chart_data){
			$.each(chart_data, function(i, data){
				if (data[3] == "Rekayasa Perangkat Lunak") {$cc_value[1][0]+= parseInt(data[2]);}
				else if (data[3] == "Teknik Komputer dan Jaringan") {$cc_value[1][1]+= parseInt(data[2]);}
				else if (data[3] == "Kimia Industri") {$cc_value[1][2]+= parseInt(data[2]);}
				else if (data[3] == "Bisnis Management") {$cc_value[1][3]+= parseInt(data[2]);}
				else if (data[3] == "Agronomi") {$cc_value[1][4]+= parseInt(data[2]);}
				$cc_value[0][i] = data[2];
				$cc_label[0][i] = data[1].replace(/Rekayasa Perangkat Lunak|Teknik Komputer dan Jaringan|Kimia Industri|Bisnis Management/g, function handling(x){ return splitword(x); });
				$cc_color[0][0][i] = bgtmp[0][i%3];
				$cc_color[0][1][i] = bgtmp[1][i%3];
			});
		}
	});
}

update_chart_data();

	var ctx = document.getElementById("chart1");
	var myChart = new Chart(ctx, {
	    type: 'bar',
	    data: {
	        labels: $cc_label[0],
	        datasets: [{
	            label: 'Jumlah Siswa',
	            data: $cc_value[0],
	            backgroundColor: $cc_color[0][0],
    	        borderColor: $cc_color[0][1],
	            borderWidth: 2
			        }]
	    },
	    options: {
	        scales: {
	            yAxes: [{
	              ticks: {
	                    beginAtZero:true,
	                    max: 40,
                    	min: 0
	                }
	            }]
	      }
	    }
	});
	
	
	
	var ctx2 = document.getElementById("chart2");
	
	var myRadarChart = new Chart(ctx2, {
	    type: 'radar',
	    data: {
	    labels: ["HTML", "CSS", "Javascript", "JSON", "PHP", "AJAX", "Ruby"],
	    datasets: [
	        
	        {
	            label: "Muhammad Sultoni [Ceritanya]",
	            backgroundColor: "rgba(255,99,132,0.2)",
	            borderColor: "rgba(255,99,132,1)",
	            pointBackgroundColor: "rgba(255,99,132,1)",
	            pointBorderColor: "#212121",
	            pointHoverBackgroundColor: "#212121",
	            pointHoverBorderColor: "rgba(255,99,132,1)",
	            data: [94, 95, 88, 57, 90, 57, 40]
	        }
	    ]
	},
	    options: {
	            scale: {
	                reverse: false,
	                ticks: {
	                    beginAtZero: true,
	                    max: 100,
                    	min: 0
	                }
	            }
	    }
	});
	

var ctx3 = document.getElementById("chart3");

var options = [];
var data = [30,20]
var myDoughnutChart = new Chart(ctx3, {
    type: 'pie',
    data: {
    labels: [
        "RPL \n [Rekayasa Perangkat Lunak]",
        "TKJ \n [Teknik Komputer dan Jaringan]",
        "KI \n [Kimia Industri]",
        "Bismen \n [Bisnis Management]",
        "Agro \n [Agri Bisnis dan Kultur Jaringan] "
    ],
    datasets: [
        {
            data: $cc_value[1],
            backgroundColor: [
                "#FFCE56",
                "#FF6384",
                "#FB56FF",
                "#36A2EB",
                "#56FF58"
            ],
            hoverBackgroundColor: [
                "#FFCE56",
                "#FF6384",
                "#FB56FF",
                "#36A2EB",
                "#56FF58"
            ]
        }]
},
    options: options
});