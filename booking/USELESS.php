


for (var j = 0; j < cells.length-9; j++) {if (cells[j].innerHTML.toLowerCase() == search_car_id.toLowerCase()) {found = true;}}
            for (var j = 1; j < cells.length-8; j++) {if (cells[j].innerHTML.toLowerCase() == search_brand.toLowerCase()) {found = true;}}
            for (var j = 2; j < cells.length-7; j++) {if (cells[j].innerHTML.toLowerCase() == search_model.toLowerCase()) {found = true;}}
            for (var j = 3; j < cells.length-6; j++) {if (cells[j].innerHTML.toLowerCase() == search_year.toLowerCase()) {found = true;}}
            for (var j = 4; j < cells.length-5; j++) {if (cells[j].innerHTML.toLowerCase() == search_seats.toLowerCase()) {found = true;}}
            for (var j = 5; j < cells.length-4; j++) {if (cells[j].innerHTML.toLowerCase() == search_brand.toLowerCase()) {found = true;}}
            for (var j = 6; j < cells.length-3; j++) {if (cells[j].innerHTML.toLowerCase() == search_brand.toLowerCase()) {found = true;}}
            for (var j = 7; j < cells.length-2; j++) {if (cells[j].innerHTML.toLowerCase() == search_brand.toLowerCase()) {found = true;}}
            for (var j = 8; j < cells.length-1; j++) {if (cells[j].innerHTML.toLowerCase() == search_brand.toLowerCase()) {found = true;}}
            for (var j = 9; j < cells.length  ; j++) {if (cells[j].innerHTML.toLowerCase() == search_brand.toLowerCase()) {found = true;}}

            if(search_car_id.toLowerCase() == "")
                { search_car_id_emFlag = 1;  } 

            else if(cells[0].innerHTML.toLowerCase()==search_car_id.toLowerCase()) 
                {search_car_id_emFlag = 1;
                    window.alert(" Found it" ); }

            else 
                {search_car_id_emFlag = 0;}

           
            window.alert("car_id_em_FLAG is " + search_car_id_emFlag);
            
                if (search_car_id_emFlag) 
                {

                    found = true;
                }
        
            if (found) {
                rows[i].style.display = "";
            } else {
                rows[i].style.display = "none";
            }















            var a=0;var b=1;var c=2;var d=3;var e=4;var f=5;var g=6;var h=7;var k=8;var l=9;


            if(search_car_id.toLowerCase() == "")
                { search_car_id_emFlag = 1;  } 

            else if(cells[a].innerHTML.toLowerCase()==search_car_id.toLowerCase()) 
                {search_car_id_emFlag = 1;
                    window.alert(" Found it" ); }

            else 
                {search_car_id_emFlag = 0;}

           
            window.alert("car_id_em_FLAG is " + search_car_id_emFlag);
            
                if (search_car_id_emFlag) 
                {

                    found = true;
                }
        
            if (found) {
                rows[i].style.display = "";
            } else {
                rows[i].style.display = "none";
            }