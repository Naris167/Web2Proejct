var notificationCount = 0;
var notifications = [];

function showNotification(message, type = "success") {
  var backgroundColor, borderColor, icon;
  if (type === "success") {
    backgroundColor = "#4CAF50";
    borderColor = "#45a049";
    icon = "✓";
  } else {
    backgroundColor = "#f44336";
    borderColor = "#da190b";
    icon = "✕";
  }

  var notification = $("<div></div>")
    .html(`<strong style="margin-right: 10px;">${icon}</strong><span>${message}</span>`)
    .css({
      position: "fixed",
      top: "-100px",
      right: "20px",
      padding: "15px 20px",
      backgroundColor: backgroundColor,
      color: "white",
      borderRadius: "5px",
      boxShadow: "0 4px 8px rgba(0,0,0,0.2)",
      zIndex: 9999,
      display: "flex",
      alignItems: "center",
      fontFamily: "Arial, sans-serif",
      fontSize: "16px",
      opacity: 0,
      transition: "all 0.5s ease",
      border: `2px solid ${borderColor}`,
      maxWidth: "300px",
      wordWrap: "break-word",
    })
    .appendTo("body");

  notifications.push(notification);

  // Remove excess notifications
  while (notifications.length > 5) {
    var oldNotification = notifications.shift();
    oldNotification.remove();
  }

  // Position notifications
  repositionNotifications();

  setTimeout(function () {
    notification.css({ opacity: 1 });
  }, 100);

  setTimeout(function () {
    notification.css({ opacity: 0 });
    setTimeout(function () {
      var index = notifications.indexOf(notification);
      if (index > -1) {
        notifications.splice(index, 1);
      }
      notification.remove();
      repositionNotifications();
    }, 500);
  }, 5000);
}

function repositionNotifications() {
  var topOffset = 90;
  notifications.forEach(function (notification, index) {
    notification.css({ top: topOffset + "px" });
    topOffset += notification.outerHeight() + 10; // 10px gap between notifications
  });
}