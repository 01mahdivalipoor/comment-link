function CommentLinkToClipboard(id) {
  var link = window.location.href;
  var standardLink = link.slice(0, link.length - 1);
  var finalLink = standardLink + '#comment-' + id;
  navigator.clipboard.writeText(finalLink);
  alert("Copied the link to clipboard.");
}
