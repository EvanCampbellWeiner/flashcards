
'use strict';
let output = document.getElementById('output');
let input = document.getElementById('address');
// var str1 = "home/1/testdata"
var str2 = "http://127.0.0.1:8000/";
var quiz =  document.getElementById('quiz');
output.onclick = function(element) {
    var str1 = document.getElementById('address').value;
    var address = str2.concat(str1);
    var i = 0;
    $.getJSON(address, function(data){
        while(data[i]!=undefined)
        {
            var question ={};
            var value=data[i];
            var string = value['Question'].concat("~");
            question[i] = string.concat(value['Answer']);
            console.log(question);
            chrome.storage.sync.set(question, function(){});
            i++;
        }
        i=i-1;
        chrome.storage.sync.set({"card": i}, function(){});
        });
        output.hidden=true;
        quiz.hidden=false;
        quizAnswer.hidden=false;
        input.hidden=true;
    }

    quiz.onclick = function(element){
        var i=1;
        chrome.storage.sync.get('card', function(data){
            if(data){
                i= data.card;
            }
            var result = chrome.storage.sync.get(null, function(data){
                if (data) {
                    var result = data[i];
                    var QNA = result.split('~');
                    $("div").text(QNA[0]);
                }
                i--;
                chrome.storage.sync.set({"card": i}, function(){});
                if(i<0){
                    quiz.disabled=true;
                }
        });
    });
}

quizAnswer.onclick = function (element){
    var i=1;
    chrome.storage.sync.get('card', function(data){
        if(data){
            i= data.card+1;
        }
        var result = chrome.storage.sync.get(null, function(data){
            if (data) {
                var result = data[i];
                var QNA = result.split('~');
                $("div").text(QNA[1]);
            }
        });
    });
}

