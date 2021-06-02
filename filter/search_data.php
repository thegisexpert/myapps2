<?php
include 'Search.php';
$search = new Search();
$sqlConditions = array();
if(!empty($_POST['type']) && (!empty($_POST['keywords']) || !empty($_POST['sortValue']))){
    if($_POST['type'] == 'search'){

        $sqlConditions['search'] = array('event_date'=>$_POST['keywords'],'event_name'=>$_POST['keywords'], 'employee_name'=>$_POST['keywords']);
        $sqlConditions['order_by'] = 'event.participation_id DESC';
    }elseif($_POST['type'] == 'sort'){
        /**
		//if($_POST['keywords']) {
			//$sqlConditions['search'] = array('event_name'=>$_POST['keywords'],'item'=>$_POST['keywords'],'value'=>$_POST['keywords']);
		}
        $sortValue = $_POST['sortValue'];
        $sortArribute = array(
            'new' => array(
                'order_by' => 'date DESC'
            ),
            'asc'=>array(
                'order_by'=>'cname ASC'
            ),
            'desc'=>array(
                'order_by'=>'cname DESC'
            ),
            'Processed'=>array(
                'where'=>array('status'=>'Processed')
            ),
            'Pending'=>array(
                'where'=>array('status'=>'Pending')
            ),
			'Cancelled'=>array(
                'where'=>array('status'=>'Cancelled')
            )
        );
        $sortKey = key($sortArribute[$sortValue]);
        $sqlConditions[$sortKey] = $sortArribute[$sortValue][$sortKey];
        */
    }
}else{
    $sqlConditions['order_by']  = 'event.participation_id DESC';
}
$orders = $search->searchResult($sqlConditions);
if(!empty($orders)){    
	foreach($orders as $order){
		$status = '';
		if($order["status"] == 'Processed') {
			$status = 'btn-success';
		} else if($order["status"] == 'Pending') {
			$status = 'btn-warning';
		} else if($order["status"] == 'Cancelled') {
			$status = 'btn-danger';
		}
		echo '<tr>';


		echo '<td>'.$order['participation_id'].'</td>';
		echo '<td>'.$order['event_name'].'</td>';
		echo '<td>'.$order['event_date'].'</td>';
		echo '<td>'.$order['name'].'</td>';
		echo '<td>'.$order['name'].'</td>';
		echo '<td><button type="button" class="btn '.$status.' btn-xs">'.$order["status"].'</button></td>';
		echo '</tr>';
	}
}else{
    echo '<tr><td colspan="5">No user(s) found...</td></tr>';
}
exit;