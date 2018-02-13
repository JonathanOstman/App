$(document).ready(function() {
  if (sessionStorage.getItem('splashScreen') !== 'true') {

  var quotes = [
    {
      quote: "You cannot shake hands with a clenched fist",
      author: "Indira Gandhi"
    },
    {
      quote: "The best preperation for tomorrow is doing your best today",
      author: "H.Jackson Brown,Jr."
    },
    {
      quote: "Not all those who wander are lost",
      author: "J.R.R. Tolkien"
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
}})