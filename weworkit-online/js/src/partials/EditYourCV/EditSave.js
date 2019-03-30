    var edit = document.getElementById("edit");
    var save = document.getElementById("save");

    function edycja(){
        edit.style.display = "none";
        save.style.display = "block";
    }

    function zapisz(){
        var x = document.getElementById("aContent").value;
        document.getElementById("content").innerHTML = x;
                    
        save.style.display = "none";
        edit.style.display = "block";
    }

    var savedlist = document.getElementById("savedlist");
    var editlist = document.getElementById("editlist");

    function edytujliste() {
        savedlist.style.display = "none";
        editlist.style.display = "block";
    }

    function zapiszliste() {
        
        editlist.style.display = "none";
        savedlist.style.display = "block";
    }


    $(document).ready(function(){

        var buttonAdd = document.getElementById('btnEx');
    
            
         z = 0;  
       
        $('#btnEx').click(function(){
            // clone
            
         
            z++;
            var listofex= $('.aCV-main-content-list-ex').find('li', 'input', 'button').last().clone();
            $('.aCV-main-content-list-ex').append(listofex); 
            i = -1;
            $('.aCV-main-content-list-ex-editing').each(function(){
                i++;
                var newID='nr'+i;
                $(this).attr('id',newID);
                $(this).val(i);
            });
            
        
            if(z == 5){
                
                buttonAdd.disabled = true;
            }
               
        });
        
    
        $('.aCV-main-content-list-ex').on('click', '.delete', function(e){
            $(e.currentTarget).closest('li').remove();
            i = $(this).val(1)
            z--;

            i = -1; // ...i tą zmienną...
            $('.aCV-main-content-list-ex-editing').each(function(){//...tutaj i wszystko działa :/
                i++;
                var newID='nr'+i;
                $(this).attr('id',newID);
                $(this).val(i);
            });

            if(z < 5){
                buttonAdd.disabled = false;
            }


            
            
        });

        

            


        $('#btnEdc').click(function(){
            // clone
            

            var listofedc = $('.aCV-main-content-list-edc').find('li', 'input', 'button').first().clone();
            var edytowany = $('.aCV-main-content-list-edc-el-input').add(i);
            // insert @bottom
            $('.aCV-main-content-list-edc').append(listofedc);
            $('.aCV-main-content-list-edc-el-input').append(edytowany);

            
        });

        $('.aCV-main-content-list-edc').on('click', '.delete', function(e){
            $(e.currentTarget).closest('li', 'input', 'button').remove();
        });

        $('.aCV-main-content-list').on('click', '.zapisz', function(e){
            $(e.currentTarget).closest('li', 'input', 'button').remove();
        });
        
        // $('.delete').click(function(e){
        //     // target's li, remove
        //     $(e.currentTarget).closest('li').remove();
        // }); 
    
    });