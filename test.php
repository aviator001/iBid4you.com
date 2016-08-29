<?

		$db = new mysqli("199.91.65.85", "gautamadmin", "Shadow2015!","ibid4you");
		$sql="UPDATE `locked` SET `locked_by`=NULL, `locked`=NULL WHERE (`id`='1')";
		$db->query($sql);
	
function check_port_lock($port) {
	global $c;
	$sql="select * from wait where port !=''";
	$q=$c->query($sql);
	if ($q) {
		sleep(1);
		check_port_lock($port);
	} else {
		$sql="insert into wait values('$port')";
		if($c->insert($sql)) {
			return $port;
		}
	}
}