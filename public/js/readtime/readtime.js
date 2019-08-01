const formatSecToMin = (seconds) =>{

    let mins = (seconds /60).toFixed(0);

    return mins <2 ? `${mins} min` : `${mins} mins`;
}

const getReadTime = (text) =>{

    let wordCount = text.split(" "), readTime, wordLength = wordCount.length;
    
    readTime = (wordLength * 60) / 200;

    return formatSecToMin(readTime);

}

let postBody = Array.from(document.querySelectorAll('#post_body'));

for(let i = 0; i<=postBody.length; i++){

    let postLength = postBody[i].innerText;

    let	readingTime= Array.from(document.querySelectorAll('#read_time'));

    for(let j = 0; j<=readingTime.length; j++){

        readingTime[i].textContent = getReadTime(postLength);
    }
// console.log(getReadTime(postBody[i].innerHTML);

}