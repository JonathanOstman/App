$(document).ready(function() {
  if (sessionStorage.getItem('splashScreen') !== 'true';)
  var quote = "You cannot shake hands with a clenched fist";
  var author = "Indira Gandhi";

  var quotes = [
    {
      quote: "Citat 1",
      author: "Author 1"
    },
    {
      quote: "Citat 2",
      author: "Author 2"
    },
    {
      quote: "Citat 3",
      author: "Author 3"
    }
  ];
  var randomQuote = quotes[Math.floor(Math.random() * quotes.length)]

  $('body').prepend('<header id="splashScreen"></header>');
  $('#splashScreen').prepend('<blockquote></blockquote>');
  $('blockquote').prepend('<p id="quote"></p>');
  $('blockquote').append('<footer id="author"></footer>');
  $('#quote').html(randomQuote.quote);
  $('#author').html(randomQuote.author);
  $('#splashScreen').show().delay(2500).fadeOut();
  sessionStorage.setItem('splashScreen', 'true');
})