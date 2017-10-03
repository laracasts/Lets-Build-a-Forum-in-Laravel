let user = window.App.user;

module.exports = {
    updateReply (reply) {
        return reply.user_id === user.id;
    }
};
