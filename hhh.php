<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>covid-map</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="covid-map.css">
	<style>
	body{
	background:white;
	}
	h3{
	color:#F08080;
	}
	</style>
</head>


<body>
    <div class="container">
					
        <h3 class="text-center">world Covid-19 Update Map</h3>

        <div class="myMap">
            <div class="map"></div>
            <div class="areaLegend col-4"></div>
            <div class="plotLegend"></div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/raphael@2.3.0/raphael.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-mousewheel@3.1.13/jquery.mousewheel.min.js"></script>
    <script src="asset/mapael/jquery.mapael.js"></script>
    <script src="asset/mapael/maps/world_countries.min.js"></script>
    <script src="dataset-t.js"></script>
    <script>
        $.get("https://corona.lmao.ninja/v2/countries").then(function(countriesResp) {
            const data = countriesResp;
            
            var tablee = []
            $.each(data, function(index) {
                tablee[index] = {}
                tablee[index]["code"] = data[index].countryInfo.iso2;
                tablee[index]["name"] = data[index].country;
                tablee[index]["cases"] = data[index].cases;
                tablee[index]["deaths"] = data[index].deaths;
                tablee[index]["recoveries"] = data[index].recovered;
            })
            var ob = procces(tablee);
            myMap(ob);
        });
        
        function myMap(data) {
            var mymap = $(".myMap").mapael({
                map: {
                    name: "world_countries",
                    defaultArea: {
                        attrs: {
                            stroke: "#fff",
                            "stroke-width": 1
                        }
                    }
                },
                legend: {
                    area: {
                        display: true,
                        title: "Territory of total confirmed cases",
                        slices: data.case_legendAreaColors
                    },
                    plot: {
                        display: true,
                        title: "Region of total confirmed cases",
                        slices: data.case_legendPlotColors
                    }
                },
                plots: data.case_cityPlots,
                areas: data.case_countryAreas
            });
            return mymap;
        };
    </script>
</body>

</html>
