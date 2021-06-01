<?php
$myConn = @mysqli_connect("localhost","sbsst","sbs123414","emp") or die("error");
session_start();
function hitArticle($id,$title){
    global $myConn;
   
    

    $sql="update article set hit=hit+1 where id=${id}";
    $rs =mysqli_query($myConn,$sql);
       
}

    function writeArticle($title,$body,$writer){
        global $myConn;
        $sql="insert into article set regdate=now(), title='${title}',`body`='${body}',hit=0,writer='{$writer}'";
        
        if(mysqli_query($myConn,$sql)){
            return 1;
        }
        return 0;
     
        
    }
    function makeMember($id,$pass,$name){
        global $myConn;
        $sql="select id from member where id='${id}'";
        $rs=mysqli_query($myConn,$sql);
        if(mysqli_fetch_assoc($rs) ){
            return 0; //아이디 중복
        }
        else{
            $sql="select name from member where `name`='${name}'";
            $rs=mysqli_query($myConn,$sql);
            if($row = mysqli_fetch_assoc($rs) ){
                return -1; //이름 중복
            }
            else{
                $sql="insert into member set id='${id}',pass='${pass}',`name`='${name}'";
                if(mysqli_query($myConn,$sql)){
                    return 1;
                }else{
                    return -2;
                }

            }
        }
        return -2;
        

     
        
    }
    function modifyMember($id,$name,$memberid){
        global $myConn;
        $sql="select id from member where id='${id}'";
        $rs=mysqli_query($myConn,$sql);
        if(mysqli_fetch_assoc($rs) ){
            return 0; //아이디 중복
        }
        else{
            $sql="select name from member where `name`='${name}'";
            $rs=mysqli_query($myConn,$sql);
            if($row = mysqli_fetch_assoc($rs) ){
                return -1; //이름 중복
            }
            else{
                $sql="update member set id='${id}',`name`='${name}'where memberid=$memberid";
                if(mysqli_query($myConn,$sql)){
                    return 1;
                }else{
                    return -2;
                }

            }
        }
        return -2;
        

     
        
    }
    function deleteArticle($id){
        global $myConn;
        $sql="delete from article where id=$id";
        $rs =mysqli_query($myConn,$sql);
        return $rs;

     
        
    }

  

    function loginMember($id,$pass){
        global $myConn;
        $sql="select id from member where id='${id}'";
        $rs =mysqli_query($myConn,$sql);
        if(!mysqli_fetch_assoc($rs)){
            return 0;//아이디가 없음
        }else{
            $sql="select pass from member where pass='${pass}'";
            $rs =mysqli_query($myConn,$sql);
            if(!mysqli_fetch_assoc($rs)){
                return -1;//비밀번호 틀림
            } 
            else return 1; 
        }
        return -2;
 
    }
    function getNumMember($id,$pass){
        global $myConn;
        $sql="select memberid from member where id='${id}'and pass='${pass}'";
        $rs =mysqli_query($myConn,$sql);
        if($temp=mysqli_fetch_assoc($rs)){
            return $temp['memberid'];
        }

    }
    function getInfoArticle($id){
        global $myConn;
        $sql="select * from article where id=$id";
        $rs =mysqli_query($myConn,$sql);
        if($temp=mysqli_fetch_assoc($rs)){
            return $temp;
        }

    }
    function getInfoMember($id){
        global $myConn;
        $sql="SELECT * FROM MEMBER WHERE memberid=$id";
        $rs =mysqli_query($myConn,$sql);
        if($temp=mysqli_fetch_assoc($rs)){
            return $temp;
        }

    }
 
    function deleteMember($memberid,$pass){
        global $myConn;
        $sql="delete FROM MEMBER WHERE memberid= $memberid and pass='${pass}'";
        $rs =mysqli_query($myConn,$sql);
 

        if(mysqli_fetch_assoc($rs)){
            return 1;
        }else{
            return 0;
        }
    }
    function writeReply($writer,$body){
        global $myConn;
        $sql="insert into reply set writer='${writer}',body='${body}'";
        $rs =mysqli_query($myConn,$sql);
 

        if(mysqli_fetch_assoc($rs)){
            return 1;
        }else{
            return 0;
        }
    }
    function listReply(){
        global $myConn;
        $sql="select * from reply";
        $rs =mysqli_query($myConn,$sql);
        $reply=[];
        
        while($reply=mysqli_fetch_assoc($rs)){
            $replies[]=$reply;
        }
        return $replies;
        
    }  
?>