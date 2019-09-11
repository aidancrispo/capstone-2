<?php 

class Reports{

	static function get_yearly_sales(){
		//Require database header
		require SCRIPTS . 'dbh.inc.php';

		$sql = "SELECT YEAR(DatePurchased) as SalesYear,
       				   MONTHNAME(STR_TO_DATE(MONTH(DatePurchased), '%m')) as SalesMonth,
       				   SUM(TotalPrice) AS TotalPrice
    			FROM finalorders
				WHERE DatePurchased >= DATE_SUB(NOW(),INTERVAL 1 YEAR) AND Status = 'Completed'
				GROUP BY YEAR(DatePurchased), MONTH(DatePurchased)
				ORDER BY YEAR(DatePurchased), MONTH(DatePurchased);";

		//Query sql string
		 $stmt = mysqli_query($Database,$sql);

		//Array to store results
		$resultsArray = array();

		//loop through information
	    while ($row = mysqli_fetch_array($stmt)) {
	        $resultsArray[] = $row;
	   	}

		//return array
		return $resultsArray;
        
        
	}
	static function get_monthly_sales(){
		//Require database header
		require SCRIPTS . 'dbh.inc.php';

		$sql = "SELECT DAY(DatePurchased) as SalesDay,
       				   MONTHNAME(STR_TO_DATE(MONTH(DatePurchased), '%m')) as SalesMonth,
       				   SUM(TotalPrice) AS TotalPrice
				FROM finalorders
				WHERE (DatePurchased BETWEEN NOW() - INTERVAL 30 DAY AND NOW()) AND Status = 'Completed'
				GROUP BY YEAR(DatePurchased), MONTH(DatePurchased), DAY(DatePurchased)
				ORDER BY YEAR(DatePurchased), MONTH(DatePurchased), DAY(DatePurchased);";

		//Query sql string
		 $stmt = mysqli_query($Database,$sql);

		//Array to store results
		$resultsArray = array();

		//loop through information
	    while ($row = mysqli_fetch_array($stmt)) {
	        $resultsArray[] = $row;
	   	}

		//return array
		return $resultsArray;
	}

	static function get_weekly_sales(){
		require SCRIPTS . 'dbh.inc.php';

		$sql = "SELECT DAYNAME(DatePurchased) as SalesDay,
       				   CONCAT(MONTHNAME(STR_TO_DATE(MONTH(DatePurchased), '%m')), ' ',DAY(DatePurchased)) as SalesDate,
       				   SUM(TotalPrice) AS TotalPrice
				FROM finalorders
				WHERE (DatePurchased >= NOW() + INTERVAL -7 DAY
   						AND DatePurchased <  NOW() + INTERVAL  0 DAY) 
                        AND Status = 'Completed'
				GROUP BY YEAR(DatePurchased), MONTH(DatePurchased), DAY(DatePurchased)
				ORDER BY YEAR(DatePurchased), MONTH(DatePurchased), DAY(DatePurchased);";

		//Query sql string
		 $stmt = mysqli_query($Database,$sql);

		//Array to store results
		$resultsArray = array();

		//loop through information
	    while ($row = mysqli_fetch_array($stmt)) {
	        $resultsArray[] = $row;
	   	}

		//return array
		return $resultsArray;
	}
/*
	static function get_sales_per_product(){
		require SCRIPTS . 'dbh.inc.php';

		$sql = "SELECT products.PROD_Name, SUM(Quantity) AS Quantity FROM finalorders
				INNER JOIN finalorders
				ON finalorders.PO_NO = finalorders.PO_NO
				INNER JOIN products
				ON products.PROD_ID = finalorders.PROD_ID
				WHERE finalorders.Status = 'Completed'
				GROUP BY finalorders.PROD_ID;";

	//Query sql string
		 $stmt = mysqli_query($Database,$sql);

		//Array to store results
		$resultsArray = array();

		//loop through information
	    while ($row = mysqli_fetch_array($stmt)) {
	        $resultsArray[] = $row;
	   	}

		//return array
		return $resultsArray;


}*/
}