<?php
$user = 'root';
$password = '';

$database = 'vote';

$servername='localhost:3306';
$mysqli = new mysqli($servername, $user,
				$password, $database);

if ($mysqli->connect_error) {
	die('Connect Error (' .
	$mysqli->connect_errno . ') '.
	$mysqli->connect_error);
}
$mysqli->close();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="voterportalcss.css">
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>VOTER PORTAL</title>
        <link rel="icon" type="image/x-icon" href="favicon.png">
    </head>
    <body>
        <div class="container">
        <div id="google_translate_element"></div>

<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
            <div class="topic">VOTER PORTAL</div>
            <div class="content">
                <input type="radio" name="slider" checked id="votregis">
                <input type="radio" name="slider" id="putvote">
                <input type="radio" name="slider" id="vstatus">
                <input type="radio" name="slider" id="dcandid">
                <input type="radio" name="slider" id="vresult">

                <div class="list">
                    <label for="votregis" class="votregis">
                        <i class="fa-solid fa-right-to-bracket"></i>
                        <span class="title">Register Yourself</span>
                    </label>

                    <label for="putvote" class="putvote">
                        <i class="fa-solid fa-hand-pointer"></i>
                        <span class="title">Give Vote</span>
                    </label>

                    <label for="vstatus" class="vstatus">
                        <span class="icon"><i class="fa-solid fa-wave-square"></i></span>
                        <span class="title">Voting Status</span>
                    </label>

                    <label for="dcandid" class="dcandid">
                        <span class="icon"><i class="fa-solid fa-people-group"></i></span>
                        <span class="title">Display Candidate List</span>
                    </label>

                    <label for="vresult" class="vresult">
                        <span class="icon"><i class="fa-solid fa-trophy"></i></span>
                        <span class="title">Voting Result</span>
                    </label>

                    <div class="slider"></div>
                </div>
                <div class="text-content">
                    <div class="votregis text">
                        <div class="title">Register as a Voter</div>
                        <form action="process-form.php" method="post">

                        <input type="text" id="voterregname"  name="name"
                            placeholder="Enter your Name">
                        <input type="text" id="voterregvotern" name="vn"
                            placeholder="Enter your Voter Number">
                        <input type="text" id="voterregadharn" name="an"
                            placeholder="Enter your Adhar Number">
                        <button id="voterregsubmit">SUBMIT</button>
                        </form>
                        <br>
                    </div>
                    
                    <div class="putvote text">
                        <div class="title">Give Your Vote</div>
                        <section id="timer"></section>
                     <div id="card1" class="column">
                    
					 <section id="box2">
	
	</section>
                                                </div>
                  
                            </div>
                    <div class="vstatus text">
                        <div class="title">VOTING STATUS: <span
                                id="vstatuscontent"></span></div>
                        <br>
                        <p>Voting status refers to the current state of an
                            election, whether it is ongoing, not started, or has
                            ended. It is important to have clear and accurate
                            information about the voting status. Voters need to
                            know whether the voting process has started, is
                            ongoing, or has ended so that they can plan when and
                            where to cast their vote. Clear and accurate
                            information about the voting status ensures that
                            voters are informed and can participate in the
                            election. By knowing the voting status, election
                            officials and political campaigns can encourage
                            voter turnout. If the voting process has not yet
                            started, they can encourage voters to register and
                            prepare to vote.</p>
                    </div>
                    <div class="dcandid text">
                        <div class="title">CANDIDATE'S LIST</div>
                        <section id="box">
	
	</section>
                                            </div>

                    <div class="vresult text">
                        <div class="title">VOTING RESULT</div>
                        <p id="winnernametext">Winner Name : <span
                                id="winnername"><b>ussssss</b></span>🎉</p>
                        <br>
						<section id="stat"></section>

                        <p id="winningmsg"><b>Congratulations</b> on winning the election! It's
                            a great
                            accomplishment and a true testament to your hard
                            work and dedication.<br>
                            Your victory is not only a triumph for you, but for
                            everyone who has supported you throughout the
                            campaign. It's a moment to celebrate, to reflect on
                            your journey, and to look forward to the future.
                            <br>
                            We wish you all the best as you begin this new
                            chapter in your life. Congratulations once again,
                            and we look forward to seeing all that you will
                            accomplish in the years to come.</p>
                    </div>
                </div>
            </div>
        </div>
        <script src="
            https://cdn.jsdelivr.net/gh/ethereum/web3.js@1.0.0-beta.36/dist/web3.min.js
            ">
        </script>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            crossorigin="anonymous">
        </script>
		 <script src="../script.js"></script>

        <script>
		document.getElementById("vstatuscontent").style.fontWeight = "bold";
            var contract;
			web3 = new Web3(web3.currentProvider);
                contract = new web3.eth.Contract(abi,address);
				var f="Voting has ended";
				var f1="Voting is going on!!! DO VOTE";
			document.getElementById("vstatuscontent").style.fontWeight = "bold";
		document.getElementById("winnernametext").style.fontWeight = "bold";
var par=[];
let r=[];
let second = 00;
                var timer=true;
                let count = 0;

                contract.methods.votingStat().call({from: '0xCa95906d551E421E75738A9804D5054cf47f23aA'}, function(error, result){
                    document.getElementById("vstatuscontent").innerHTML=result;
                    document.getElementById("winnernametext").innerHTML=result;

					track=result;
					console.log(result);
					if(result.localeCompare(f)==0)
					{
						document.getElementById("winningmsg").style.display = "block";
				contract.methods.getWinnerNames().call({from: '0xCa95906d551E421E75738A9804D5054cf47f23aA'}, function(error, result){
					for(var i=0;i<result.length;i++)
					{
							r[i]=result[i];
					}
					if(r.length>1){
						document.getElementById("winnernametext").innerHTML+= "\nWinners Are: ";

						for(var i=1;i<r.length;i++)
					{
							if(i>1){
							document.getElementById("winnernametext").innerHTML+= " , "+r[i];
							}
							else{
								document.getElementById("winnernametext").innerHTML+=r[i];

							}
					}
				}
				else{
					document.getElementById("winnernametext").innerHTML="\n"+ r[0];
				}
					console.log(r);
					document.getElementById("winnernametext").innerHTML+=" is the winner of this election";

				});
					
					}
					else {
						if(result.localeCompare(f1)==0){
					contract.methods.partyDisplay().call({from: '0xCa95906d551E421E75738A9804D5054cf47f23aA'}, function(error, result){
							console.log(result[1]);
					
						var html="<table border='1|1'>";
				html+="<th>Party Name</th>";
				html+="<th>Voting Percentage(%)</th>";
				 var total=result[1];
				for (var i = 1; i < result[0].length; i++) {
    html+="<tr>";
    html+="<td>"+result[0][i].name+"</td>";
	var v=(result[0][i].totalvote/total)*100;
    html+="<td>"+v+"</td>";
	html+="</tr>";
				}
				html+="</table>";
document.getElementById("stat").innerHTML = html;
});
			}
						document.getElementById("winningmsg").style.display = "none";

					}
                    
					
});
contract.methods.candidateDisplay().call({from: '0xCa95906d551E421E75738A9804D5054cf47f23aA'}, function(error, result){
	if(result.length!=0){			
       if(document.getElementById("vstatuscontent").innerHTML != "Voting is going on!!! DO VOTE"){
    	document.getElementById("box2").style.fontWeight = "bold";
        document.getElementById("box2").style.fontSize = "25px";

        document.getElementById("box2").innerHTML =document.getElementById("vstatuscontent").innerHTML ;
    }
    else{
        var input = document.createElement('input');
        var button = document.createElement('button');
        input.type = 'text';
        input.id='vst1';
        input.placeholder='Enter your number';
    button.type = 'text';
    button.innerHTML = 'Get OTP';
    button.id = 'btn1';

    // const api_key = "4c78b99c-cf0e-11ed-81b6-0200cd936042";
    const api_key = "52429d33-d35d-11ed-addf-0200cd936042";
    let session_id;
    var t1;
    button.onclick = function send() {
        console.log(document.getElementById("vst1").value);
      var b;
      b=web3.eth.getAccounts().then(function(accounts)
{
    return accounts[0];
}).then(function(tx)
{
       console.log(tx);
        contract.methods.checkVoter(document.getElementById("vst1").value).call({from:tx}, function(error, result){
       console.log(result);
       if(result){
let mobileNumber = Number(document.getElementById("vst1").value);
let url = `https://2factor.in/API/V1/${api_key}/SMS/+91${mobileNumber}/AUTOGEN`;


fetch(url)

    .then((response) => response.json())

    .then((data) => {
        alert("Verified✅ OTP send successfully");
        t5();

        if (data["Status"] == "Success") {

            session_id = data["Details"];
            console.log(data);
        }

    })

    .catch((err) => {

        alert("Error", err);

    });
}

else{
t1=false;
document.getElementById("box2").innerHTML="Not verified❌";
}

});


})

};
    document.getElementById("box2").appendChild(input);
    document.getElementById("box2").appendChild(button);
    var verified;

    function t5(){
        document.getElementById("box2").removeChild(input);
    document.getElementById("box2").removeChild(button);
            var input1 = document.createElement('input');
        var button1 = document.createElement('button');
        input1.type = 'text';
        input1.id='vst2';
        input1.placeholder='Enter your OTP';

    button1.type = 'text';
    button1.innerHTML = 'Verify';
    button1.id = 'btn2';
    document.getElementById("box2").appendChild(input1);
    document.getElementById("box2").appendChild(button1);
    button1.onclick=function verify()
        {
            let otP=Number(document.getElementById("vst2").value);
            let url = `https://2factor.in/API/V1/${api_key}/SMS/VERIFY/${session_id}/${otP}`;
            fetch(url)
            .then((response)=> response.json())
            .then((data)=>{
                if(data["Details"] == "OTP Matched")
                {
                   
                    console.log(data);
                    alert("OTP Matched");
                    document.getElementById("box2").removeChild(input1);
                    document.getElementById("box2").removeChild(button1);
                    t6(true);
                }
                else{
                    alert("OTP Mismatched❌");

                }
            })
            .catch((err)=> console.log(err));
            function t6(a){
            console.log(a);
        if(a){
                var html2="<table border='1|1'>";
                setTimeout(refresh,5000);
                function stopWatch() {
              
    if (timer) {
        count++;
  
        if (count == 100) {
            second++;
            count = 0;
        }
  
        if (second == 60) {
            minute++;
            second = 0;
        }
  
  

        let secString = second;
        let countString = count;
        if (second < 5) {

        document.getElementById("timer").innerHTML = 5-parseInt(secString);
        }
        else{
            document.getElementById("timer").innerHTML = "";
        }
        if(count==1){
        console.log(second);
        }
        if(second<5){
        setTimeout(stopWatch, 10);
        }
    }
}
stopWatch();
                html2+="<th>Candidate Name</th>";
				html2+="<th>Party Name</th>";
				html2+="<th>Vote</th>";
for (var i = 1; i < result.length; i++) {
	if(result[i].registered!=false){
        html2+="<tr>";
        html2+="<td>"+result[i].name+"</td>";
	    html2+="<td>"+result[i].party+"</td>";    
        html2+="<td><button id='gVo' onclick='vOte("+(i)+")'>Vote</button></td>";
        html2+="</tr>";
    }
}

html2+="</table>";
document.getElementById("box2").innerHTML = html2;

function refresh()
{
    document.getElementById("box2").innerHTML="Timeout";
}
        }

        }
    }
   
        
    }
   

}
var html = "<table border='1|1'>";
				html+="<th>Candidate Name</th>";
				html+="<th>Party Name</th>";
for (var i = 1; i < result.length; i++) {
	if(result[i].registered!=false){
    html+="<tr>";
    html+="<td>"+result[i].name+"</td>";
    html+="<td>"+result[i].party+"</td>";    
    html+="</tr>";
	}
}
html+="</table>";
document.getElementById("box").innerHTML = html;

}
					else{
	document.getElementById("box2").innerHTML = "No Candidate is registered yet";
	document.getElementById("box2").style.fontWeight = "bold";
	document.getElementById("box").innerHTML = "No Candidate is registered yet";
	document.getElementById("box").style.fontWeight = "bold";

}

				});

				

           function vOte(a)
            {

                let amt = parseInt(a);
                console.log(amt);
                web3.eth.getAccounts().then(function(accounts)
                {
                    var acc = accounts[0];
                    return contract.methods.putVote(amt).send({from:acc});
                }).then(function(tx)
                {
                    console.log(tx);
                }).catch(function(tx)
                {
                    console.log(tx);
                })
            }
        </script>
    </body>
</html>
