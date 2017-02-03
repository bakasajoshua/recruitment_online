<?php 
    // $vacancies = json_decode($vacancies);
    // $total_rows = sizeof($vacancies);
    // $resultsPerPage = 10;
    // $lastPageNumber = ceil($total_rows/$resultsPerPage);

    // if($lastPageNumber < 1){
    //     $lastPageNumber = 1
    // }

    // $pageNum = 1;//sets the default first page

    // if(isset($_GET['pn'])){
    //     $pagenum = preg_replace('#[^0-9]', '', $_GET['pn']);//gets page number from URLit present else equals 1
    // }

    // //makes sure pageNum is not less than 1
    // if($pageNum < 1){
    //     $pageNum = 1;
    // }else if($pageNum > $lastPageNumber){
    //     $pageNum = $lastPageNumber;
    // }

    // //sets the range of rows to query
    // $limit = "LIMIT ".($pageNum - 1) * $resultsPerPage. " , ".$resultsPerPage;
    // //find a way to send this to the backed

    // $textLine1 = "Testimonials (<b>$rows</b>)";
    // $textLine2 = "Page <b> $pageNum </b> of <b> $lastPageNumber </b>";

    // //if there is more than 1 page worth of results
    // $paginationCtrls = "";
    // if($last != 1){
    //     //no need for link to previous page because there is just one page
    //     if($pageNum > 1){
    //         $previous = $pageNum -1;
    //         $paginationCtrls .= '<a href="'.base_url().'?pn='.$previous.'">Previous</a> &nbsp; &nbsp; ';
    //         //render clickable links to appear to the left of target page bumber
    //         for($i = $pageNum-4; $i < $pageNum; $i++){
    //             if($i > 0){
    //                 $paginationCtrls .= '<a href="'.base_url().'?pn='.$i.'">'.$i.'</a> &nbsp &nbsp';
    //             }
    //         }
    //     }
    //     //render target page number without it being a line
    //     $paginationCtrls .= ''.$pageNum.'&nbsp';
    //     //render clickable links to the right
    //     for($i = $pageNum+1; $i <= $lastPageNumber; $i++){
    //         $paginationCtrls .= '<a href="'.base_url().'?pn='.$i.'">'.$i.'</a> &nbsp &nbsp';
    //             if($i >= $pageNum+4){
    //                 break;
    //             }
    //     }

    //     //show next word section navigation links
    //     if($pageNum != $lastPageNumber){
    //         $newt = $pageNum + 1;
    //         $paginationCtrls .= '&nbsp &nbsp &nbsp <a href="'.base_url().'?pn='.$next.'">Next</a>';
    //     }

    // }
    // $list = '';

    // while(){
        
    // }
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