function updatePHDateTime() {
  const dateOptions = {
    timeZone: 'Asia/Manila',
    weekday: 'long',
    year: 'numeric',
    month: 'long',
    day: 'numeric'
  };

  const timeOptions = {
    timeZone: 'Asia/Manila',
    hour: '2-digit',
    minute: '2-digit',
    second: '2-digit'
  };

  const now = new Date();

  const date = new Intl.DateTimeFormat('en-PH', dateOptions).format(now);
  const time = new Intl.DateTimeFormat('en-PH', timeOptions).format(now);

  document.getElementById('phDate').textContent = `${date} | ${time}`;
}

// run immediately
updatePHDateTime();

// update every second
setInterval(updatePHDateTime, 1000);
