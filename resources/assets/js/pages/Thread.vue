<script>
    import Replies from '../components/Replies.vue';
    import SubscribeButton from '../components/SubscribeButton.vue';

    export default {
        props: ['thread'],

        components: {Replies, SubscribeButton},

        data () {
            return {
                repliesCount: this.thread.replies_count,
                locked: this.thread.locked,
                title: this.thread.title,
                body: this.thread.body,
                form: {},
                editing: false
            };
        },

        created () {
            this.resetForm();
        },

        methods: {
            toggleLock () {
                let uri = `/locked-threads/${this.thread.slug}`;

                axios[this.locked ? 'delete' : 'post'](uri);

                this.locked = ! this.locked;
            },

            update () {
                let uri = `/threads/${this.thread.channel.slug}/${this.thread.slug}`;

                axios.patch(uri, this.form).then(() => {
                    this.editing = false;
                    this.title = this.form.title;
                    this.body = this.form.body;

                    flash('Your thread has been updated.');
                })
            },

            resetForm () {
                this.form = {
                    title: this.thread.title,
                    body: this.thread.body
                };

                this.editing = false;
            }
        }
    }
</script>
