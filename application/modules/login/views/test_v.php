<?php 
    $vacancies = json_decode($vacancies);
    $total_rows = sizeof($vacancies);
    $resultsPerPage = 10;
    $lastPageNumber = ceil($total_rows/$resultsPerPage);

    if($lastPageNumber < 1){
        $lastPageNumber = 1
    }
?>
<html>
    <head>
        <script type="text/javascript">
            $resultsPerPage = "<?php echo $resultsPerPage; ?>";
            $lastPageNumber = "<?php echo $lastPageNumber; ?>";
            
            function request_page($pageNumber){
                $results_box = $("#results_box");
                $pagination_controls = $("#pagination_controls");

                $results_box.innerHTML = "loading results ...";

            }
        </script>
    </head>

    <body>
        <div id="pagination_controls"></div>
        <div id="results_box"></div>

        <script>
            request_page(1);//by default this will load page 1
        </script>
    </body>
</html>