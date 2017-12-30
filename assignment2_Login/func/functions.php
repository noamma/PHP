<?
class func
{
 public static function checkLoginState($dbh)
 {
     if(!isset($_SESSION['id']) || !isset($_COOKIE['PHPSESSID']))
     {
         session_start();
     }
     if (isset($_COOKIE['id']) && isset($_COOKIE['token']) && isset($_COOKIE['serial']))
     {
         $query = "SELECT * FROM sessions WHERE session_userid = :userid AND session_token = :token AND session_serial = :serial;";

        $userid = $_COOKIE['userid'];
        $token = $_COOKIE['token'];
        $serial = $_COOKIE['serial'];

        $stmt = $dbh->prepare($query);
        $stmt->execute(array(':userid' => $userid, ':token' => $token, ':seral' => $serial));

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if($row['session_userid'] > 0)
        {
            if (
                $row['session_userid'] == $_COOKIE['userid'] &&
                $row['session_token'] == $_COOKIE['token'] &&
                $row['session_serial'] == $_COOKIE['serial'] 
            )
            {
                if(
                    $row['session_userid'] == $_SESSION['userid'] &&
                    $row['session_token'] == $_SESSION['token'] &&
                    $row['session_serial'] == $_SESSION['serial']
                )
                {
                    return true;
                }
            }
        }



     }
 }
 
public static function createRecord($dbh, $user_id, $user_username)
{
    $query = "INSERT INTO sessions (session_userid, session_token, session_serial, session_date) VALUES (:user_id, :token, :serial, '19/08/2017');";

    $stmt = $dbh->prepare('DELETE FROM sessions WHERE session_userid= :session_userid;');
   // $stmt->execute(array('session_userid'));

    $token = func::createString(32);
    $serial = func::createString(32);

    func::createCookie($user_username, $user_id, $token, $serial);
    func::createSession($user_username, $user_id, $token, $serial);

    $stmt = $dbh->prepare($query);
    $stmt->execute(array(':user_id' => $user_id, ':token' => $token, ':serial' => $serial));
}

public static function CreateCookie($user_username, $user_id, $token, $serial)
{
    setcookie('user_id', $user_id, time() + (86400) * 30, "/");
    setcookie('user_username', $user_username, time() + (86400) * 30, "/");
    setcookie('token', $token, time() + (86400) * 30, "/");
    setcookie('serial', $serial, time() + (86400) * 30, "/");
}

public static function CreateSession($user_username, $user_id, $token, $serial)
{
    if(!isset($_SESSION['id']) || !isset($_COOKIE['PHPSESSID']))
    {
        session_start();
    }
    $_SESSION['user_username'] = $user_username;
}

 public static function createString($len)
 {
     $string = "h43uk5y9384t7895g6n45fyo98495nyuni5jyhki54hg3944htih8934ty5yo5i4u3tg984yg3984ty3ho4iuth38r";
     $s = '';
     $r_new = '';
     $r_old = '';

     for ($i = 1; $i < $len; $i++)
     {
         while($r_old == $r_new)
         {
             $r_new = rand(0, 60);
         }
         $r_old = $r_new;

         $s = $s . $string[$r_new];
     }
     return $s;
 }
}
?>