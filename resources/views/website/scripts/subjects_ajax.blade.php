<script>
    $(document).ready(function () {
        let isTamil=0;
        let isEnglish=0;
        let selectedDepartment=0;

        // $(selector).click(function (e) { 
        //     e.preventDefault();
            
        // });

        // function subjectAjax(){
        //     $.ajax({
        //         type: "get",
        //         url: "/subjects/filter/" + selectedLanguage +"/"+ selectedDepartment,
        //         success: function (response) {
                    
        //         }
        //     });
        // }
        function checkLang(){
            checkTamil();
            checkEnglish();
        }
        function checkTamil(){
            if(isTamil==0){
                isTamil=1;
            }
            else{
                isTamil=0;
            }
            if(isTamil==1){
                $(".tamilbutton").css("color", "green");
            }else{
                $(".tamilbutton").css("color", "white");
            }
            languageFilter();
        }
        function checkEnglish(){
            if(isEnglish==0){
                isEnglish=1;
            }
            else{
                isEnglish=0;
            }
            if(isEnglish==1){
                $('.englishbutton').css("color", "green");
            }else{
                $('.englishbutton').css("color", "white");
            }
            languageFilter();  
        }
        function languageFilter(){
            $('.defaultlist').hide();
            if(isEnglish==1){
                $('.english').show();
            }else{
                $('.english').hide();
            }

            if(isTamil==1){
                $('.tamil').show();
            }else{
                $('.tamil').hide();
            } 
            if(isTamil==0 && isEnglish==0){
                $('.defaultlist').show();
            }  
            departmentFilter();    
        }
        $('.tamilbutton').click(function (e) { 
            e.preventDefault();
            checkTamil();     
        });
        $('.englishbutton').click(function (e) { 
            e.preventDefault();
            checkEnglish();
         });
        function departmentFilter(){
          if(selectedDepartment!=0){
                $('#'+selectedDepartment).show();
           if(isTamil==1 && isEnglish==0){
            $('.english').hide();
           }
           if(isEnglish==1 &&isTamil==0){
            $('.tamil').hide();
           }
        }           
        }

     $(".selectedDepartment").click(function (e) { 
        e.preventDefault();
        $('.defaultlist').hide();
        $(".selectedDepartment").css("color", "white");
        if(selectedDepartment==$(this).attr('data-id')){
            $(this).css("color", "white");
            selectedDepartment=0;
            languageFilter();

        }else{
            $(this).css("color", "green");
            selectedDepartment=$(this).attr('data-id');
            departmentFilter();
        }
        
        
     });
    });
</script>