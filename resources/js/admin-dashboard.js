window.Echo.channel("users").listen("UserRegistered", (e) => {
    console.log("New user registered:", e);
});

window.Echo.channel("chats").listen("ChatMessageSent", (e) => {
    console.log("New Message: ", e);
});
