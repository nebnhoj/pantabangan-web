<template>
    <div class="collapse collapse-arrow bg-base-200">
  <input type="radio" name="my-accordion-2" checked="checked" />
  <div class="collapse-title text-xl font-medium">{{ comment.author }}</div>
  <div class="collapse-content">
    <div class="bg-gray-100 p-4 border border-gray-300 rounded-lg shadow-sm ml-4">
      <div class="flex justify-between items-center mb-2">
        <span class="text-gray-500 text-sm">{{ formattedDate(comment.date_created) }}</span>
      </div>
      <p class="mb-2">{{ comment.text }}</p>
      <div class="flex gap-2 mb-4">
        <button @click="() => react(comment.id, 'like')" class="flex items-center text-blue-500 hover:text-blue-600">
          Like
          <span class="ml-1 text-sm">{{ comment.reactions_like }}</span>
        </button>
        <button @click="() => react(comment.id, 'love')" class="flex items-center text-pink-500 hover:text-pink-600">
          Love
          <span class="ml-1 text-sm">{{ comment.reactions_love }}</span>
        </button>
        <!-- Additional reactions here -->
      </div>
      <button @click="toggleReplyForm" class="text-blue-500 hover:text-blue-600">Reply</button>
      <div v-if="showReplyForm" class="mt-4">
        <textarea v-model="replyText" placeholder="Add a reply..." class="w-full p-2 border border-gray-300 rounded-lg" rows="3"></textarea>
        <button @click="addReply" class="mt-2 px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">Post Reply</button>
      </div>
      <div v-if="comment.replies && comment.replies.length" class="mt-4">
        <CommentCard
          v-for="reply in comment.replies"
          :key="reply.id"
          :comment="reply"
          @add-reply="addReply"
          @react="react"
        />
      </div>
    </div>
    </div>
</div>
  </template>

  <script setup lang="ts">
  import { ref } from 'vue';

  const props = defineProps<{ comment: any }>();
  const emit = defineEmits(['add-reply', 'react']);

  const showReplyForm = ref(false);
  const replyText = ref('');

  const toggleReplyForm = () => {
    showReplyForm.value = !showReplyForm.value;
  };

  const addReply = () => {
    if (replyText.value.trim()) {
      emit('add-reply', props.comment.id, replyText.value);
      replyText.value = '';
      showReplyForm.value = false;
    }
  };

  const react = (reactionType: string) => {
    emit('react', props.comment.id, reactionType);
  };

  const formattedDate = (dateString: string) => {
    const date = new Date(dateString);
    return date.toLocaleDateString('en-US', {
      year: 'numeric',
      month: 'long',
      day: 'numeric',
    });
  };
  </script>
