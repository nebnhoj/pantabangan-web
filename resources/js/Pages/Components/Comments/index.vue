<template>
    <div class="max-w-3xl mx-auto p-6">
        <h3 class="text-2xl font-bold mb-4">Comments ({{ totalComments }})</h3>

        <!-- Add Comment Form -->
        <div class="bg-white p-4 rounded-lg shadow-md mb-6">
            <textarea v-model="newCommentText" placeholder="Add a comment..."
                class="w-full p-2 border border-gray-300 rounded-lg" rows="4"></textarea>
            <button @click="createComment(null)"
                class="mt-2 px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">Post
                Comment</button>
        </div>

        <!-- Comments List -->
        <div v-if="comments.length" class="space-y-4">
            <CommentCard v-for="comment in comments" :key="comment.id" :comment="comment" @add-reply="createComment"
                @react="react" />
        </div>
        <div v-else class="text-center text-gray-500">No comments yet...</div>
    </div>
</template>

<script setup lang="ts">
import { ref, onMounted, computed } from 'vue';
import axios from 'axios';
import CommentCard from './CommentCard.vue';
const props = defineProps<{ url: string }>();

const newCommentText = ref('');
const comments = ref<any[]>([]);

const fetchComments = async () => {
    try {
        const response = await axios.get(`https://cms.johnben.xyz/items/comments?filter[url][_eq]=${props.url}`);
        comments.value = response.data.data;
        console.log(response.data.data)
    } catch (error) {
        console.error('Error fetching comments:', error);
    }
};

const createComment = async (parentId: number | null) => {
    if (!newCommentText.value.trim()) return;

    const newCommentData = {
        author: 'Current User', // Replace with actual user info
        text: newCommentText.value,
        date_created: new Date().toISOString(),
        parent_id: parentId,
        reactions_like: 0,
        reactions_love: 0,
        reactions_haha: 0,
        reactions_sad: 0,
        reactions_angry: 0,
        url: props.url
    };

    try {
        const response = await axios.post('https://cms.johnben.xyz/items/comments', newCommentData);
        const createdComment = response.data;
        if (parentId) {
            const parentComment = comments.value.find(c => c.id === parentId);
            if (parentComment) {
                parentComment.replies.push(createdComment);
            }
        } else {
            comments.value.push(createdComment);
        }
        newCommentText.value = '';
    } catch (error) {
        console.error('Error creating comment:', error);
    }
};

const react = async (commentId: number, reactionType: string) => {
    const comment = comments.value.find(c => c.id === commentId);
    if (!comment) return;

    comment[`reactions_${reactionType}`] = (comment[`reactions_${reactionType}`] || 0) + 1;

    try {
        await axios.put(`https://cms.johnben.xyz/items/comments/${commentId}`, { reactions: comment });
    } catch (error) {
        console.error('Error updating reactions:', error);
    }
};


// Compute total comments
const totalComments = computed(() => {
  const countReplies = (replies: any[] = []) => {
    return replies.reduce((acc, reply) => acc + 1 + countReplies(reply.replies || []), 0);
  };

  return comments.value.length + comments.value.reduce((acc, comment) => acc + countReplies(comment.replies || []), 0);
});

onMounted(() => {
    fetchComments();
});
</script>
