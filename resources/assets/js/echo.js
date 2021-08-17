import Event from './event';
Echo.join('chat')
    .here(users => {
        Event.$emit('users.here', users);
    })
    .joining(user => {
        Event.$emit('users.joined', user);
    })
    .leaving(user => {
        Event.$emit('users.left', user);
    })
    .listen('MessageCreated', (data) => {
        Event.$emit('added_message', data.message);
    })
    .listen('CuratorMessageCreated', (data) => {
        Event.$emit('curator_added_message', data.message);
    })
    .listen('SupportMessageCreated', (data) => {
        Event.$emit('support_added_message', data.message);
    })
    .listen('MessageEdited', (data) => {
        Event.$emit('editMessage', data.message);
    })
    .listen('MessageDeleted', (data) => {
        Event.$emit('deleteMessage', data.message);
    })
    .listen('MessageSeen', (data) => {
        Event.$emit('seenMessage', data);
    });