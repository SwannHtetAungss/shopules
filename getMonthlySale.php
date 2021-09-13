<?php 
	require 'connection.php';

	$active=0;

	// January
	$janfirst=strtotime('first day of January');
	$janlast=strtotime('last day of January');

	$janStart=date('Y-m-d',$janfirst);
	$janEnd=date('Y-m-d',$janlast);

	$sql="SELECT COALESCE(SUM(ord.total),0) as total FROM orders ord INNER JOIN users u ON ord.user_id=u.id WHERE u.status=:value1 AND ord.orderdate BETWEEN :value2 and :value3";

    $statement=$pdo->prepare($sql);
    $statement->bindParam(':value1',$active);
    $statement->bindParam(':value2',$janStart);
    $statement->bindParam(':value3',$janEnd);
    $statement->execute();
    $janResult=$statement->fetch(PDO::FETCH_ASSOC);

    //var_dump($janResult);

    // February
	$febfirst=strtotime('first day of February');
	$feblast=strtotime('last day of February');

	$febStart=date('Y-m-d',$febfirst);
	$febEnd=date('Y-m-d',$feblast);

	$sql="SELECT COALESCE(SUM(ord.total),0) as total FROM orders ord INNER JOIN users u ON ord.user_id=u.id WHERE u.status=:value1 AND ord.orderdate BETWEEN :value2 and :value3";

    $statement=$pdo->prepare($sql);
    $statement->bindParam(':value1',$active);
    $statement->bindParam(':value2',$febStart);
    $statement->bindParam(':value3',$febEnd);
    $statement->execute();
    $febResult=$statement->fetch(PDO::FETCH_ASSOC);

    // March
	$marfirst=strtotime('first day of March');
	$marlast=strtotime('last day of March');

	$marStart=date('Y-m-d',$marfirst);
	$marEnd=date('Y-m-d',$marlast);

	$sql="SELECT COALESCE(SUM(ord.total),0) as total FROM orders ord INNER JOIN users u ON ord.user_id=u.id WHERE u.status=:value1 AND ord.orderdate BETWEEN :value2 and :value3";

    $statement=$pdo->prepare($sql);
    $statement->bindParam(':value1',$active);
    $statement->bindParam(':value2',$marStart);
    $statement->bindParam(':value3',$marEnd);
    $statement->execute();
    $marResult=$statement->fetch(PDO::FETCH_ASSOC);

    // April
	$aprfirst=strtotime('first day of April');
	$aprlast=strtotime('last day of April');

	$aprStart=date('Y-m-d',$aprfirst);
	$aprEnd=date('Y-m-d',$aprlast);

	$sql="SELECT COALESCE(SUM(ord.total),0) as total FROM orders ord INNER JOIN users u ON ord.user_id=u.id WHERE u.status=:value1 AND ord.orderdate BETWEEN :value2 and :value3";

    $statement=$pdo->prepare($sql);
    $statement->bindParam(':value1',$active);
    $statement->bindParam(':value2',$aprStart);
    $statement->bindParam(':value3',$aprEnd);
    $statement->execute();
    $aprResult=$statement->fetch(PDO::FETCH_ASSOC);

    // May
	$mayfirst=strtotime('first day of May');
	$maylast=strtotime('last day of May');

	$mayStart=date('Y-m-d',$mayfirst);
	$mayEnd=date('Y-m-d',$maylast);

	$sql="SELECT COALESCE(SUM(ord.total),0) as total FROM orders ord INNER JOIN users u ON ord.user_id=u.id WHERE u.status=:value1 AND ord.orderdate BETWEEN :value2 and :value3";

    $statement=$pdo->prepare($sql);
    $statement->bindParam(':value1',$active);
    $statement->bindParam(':value2',$mayStart);
    $statement->bindParam(':value3',$mayEnd);
    $statement->execute();
    $mayResult=$statement->fetch(PDO::FETCH_ASSOC);

    // June
	$junfirst=strtotime('first day of June');
	$junlast=strtotime('last day of June');

	$junStart=date('Y-m-d',$junfirst);
	$junEnd=date('Y-m-d',$junlast);

	$sql="SELECT COALESCE(SUM(ord.total),0) as total FROM orders ord INNER JOIN users u ON ord.user_id=u.id WHERE u.status=:value1 AND ord.orderdate BETWEEN :value2 and :value3";

    $statement=$pdo->prepare($sql);
    $statement->bindParam(':value1',$active);
    $statement->bindParam(':value2',$junStart);
    $statement->bindParam(':value3',$junEnd);
    $statement->execute();
    $junResult=$statement->fetch(PDO::FETCH_ASSOC);

    // July
	$julfirst=strtotime('first day of July');
	$jullast=strtotime('last day of July');

	$julStart=date('Y-m-d',$julfirst);
	$julEnd=date('Y-m-d',$jullast);

	$sql="SELECT COALESCE(SUM(ord.total),0) as total FROM orders ord INNER JOIN users u ON ord.user_id=u.id WHERE u.status=:value1 AND ord.orderdate BETWEEN :value2 and :value3";

    $statement=$pdo->prepare($sql);
    $statement->bindParam(':value1',$active);
    $statement->bindParam(':value2',$julStart);
    $statement->bindParam(':value3',$julEnd);
    $statement->execute();
    $julResult=$statement->fetch(PDO::FETCH_ASSOC);

    // August
	$augfirst=strtotime('first day of August');
	$auglast=strtotime('last day of August');

	$augStart=date('Y-m-d',$augfirst);
	$augEnd=date('Y-m-d',$auglast);

	$sql="SELECT COALESCE(SUM(ord.total),0) as total FROM orders ord INNER JOIN users u ON ord.user_id=u.id WHERE u.status=:value1 AND ord.orderdate BETWEEN :value2 and :value3";

    $statement=$pdo->prepare($sql);
    $statement->bindParam(':value1',$active);
    $statement->bindParam(':value2',$augStart);
    $statement->bindParam(':value3',$augEnd);
    $statement->execute();
    $augResult=$statement->fetch(PDO::FETCH_ASSOC);

    // September
	$sepfirst=strtotime('first day of September');
	$seplast=strtotime('last day of September');

	$sepStart=date('Y-m-d',$sepfirst);
	$sepEnd=date('Y-m-d',$seplast);

	$sql="SELECT COALESCE(SUM(ord.total),0) as total FROM orders ord INNER JOIN users u ON ord.user_id=u.id WHERE u.status=:value1 AND ord.orderdate BETWEEN :value2 and :value3";

    $statement=$pdo->prepare($sql);
    $statement->bindParam(':value1',$active);
    $statement->bindParam(':value2',$sepStart);
    $statement->bindParam(':value3',$sepEnd);
    $statement->execute();
    $sepResult=$statement->fetch(PDO::FETCH_ASSOC);

    // October
	$octfirst=strtotime('first day of October');
	$octlast=strtotime('last day of October');

	$octStart=date('Y-m-d',$octfirst);
	$octEnd=date('Y-m-d',$octlast);

	$sql="SELECT COALESCE(SUM(ord.total),0) as total FROM orders ord INNER JOIN users u ON ord.user_id=u.id WHERE u.status=:value1 AND ord.orderdate BETWEEN :value2 and :value3";

    $statement=$pdo->prepare($sql);
    $statement->bindParam(':value1',$active);
    $statement->bindParam(':value2',$octStart);
    $statement->bindParam(':value3',$octEnd);
    $statement->execute();
    $octResult=$statement->fetch(PDO::FETCH_ASSOC);

    // November
	$novfirst=strtotime('first day of November');
	$novlast=strtotime('last day of November');

	$novStart=date('Y-m-d',$novfirst);
	$novEnd=date('Y-m-d',$novlast);

	$sql="SELECT COALESCE(SUM(ord.total),0) as total FROM orders ord INNER JOIN users u ON ord.user_id=u.id WHERE u.status=:value1 AND ord.orderdate BETWEEN :value2 and :value3";

    $statement=$pdo->prepare($sql);
    $statement->bindParam(':value1',$active);
    $statement->bindParam(':value2',$novStart);
    $statement->bindParam(':value3',$novEnd);
    $statement->execute();
    $novResult=$statement->fetch(PDO::FETCH_ASSOC);

    // December
	$decfirst=strtotime('first day of December');
	$declast=strtotime('last day of December');

	$decStart=date('Y-m-d',$decfirst);
	$decEnd=date('Y-m-d',$declast);

	$sql="SELECT COALESCE(SUM(ord.total),0) as total FROM orders ord INNER JOIN users u ON ord.user_id=u.id WHERE u.status=:value1 AND ord.orderdate BETWEEN :value2 and :value3";

    $statement=$pdo->prepare($sql);
    $statement->bindParam(':value1',$active);
    $statement->bindParam(':value2',$decStart);
    $statement->bindParam(':value3',$decEnd);
    $statement->execute();
    $decResult=$statement->fetch(PDO::FETCH_ASSOC);

    //-------------------------------------------------

    $total=array(
    	$janResult['total'],$febResult['total'],$marResult['total'],$aprResult['total'],$mayResult['total'],$junResult['total'],$julResult['total'],$augResult['total'],$sepResult['total'],$octResult['total'],$novResult['total'],$decResult['total']
    );

    //var_dump($total);

    echo json_encode($total);
?>