document.addEventListener("DOMContentLoaded",function(event){


});

function ReplyComment(event)
{
	var li = event.target.parentElement;
	var commentId=li.querySelector("input[type='hidden']").value;
	var ul = event.target.parentElement.parentElement;
	var forms=ul.getElementsByClassName("commentInputs");
	if(forms.length>0){
		for(var i=0;i<forms.length;i++){
			forms[i].remove();
		}
	}
		li.appendChild(createCommentForm(commentId));

}
function createCommentForm(commentId)
{
	var commentInputs = document.createElement("div");
	var commentInputsClass = document.createAttribute("class");
	commentInputsClass.value="commentInputs";
	commentInputs.setAttributeNode(commentInputsClass);
	var film_id = new URLSearchParams(window.location.search.slice(1));
	var replyComment = `
		<form action="comment.php" method="POST">
            <input type="hidden" name="film_id" value="${film_id.get("film_id")}">
			<input type="hidden" name="comment_id" value="${commentId}">
            <textarea placeholder="Yorum Yap" name="comment"></textarea>
            <input type="submit"  value="Yorum Yap">
        </form>
	`;
	commentInputs.innerHTML = replyComment;
	return commentInputs;
}