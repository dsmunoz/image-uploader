<template>
    <div>
        <el-form class="centered">
            <h2> File uploader</h2>
            <p>
                Please select or drop a .png file to upload.
            </p>
            <div class="image-preview">
                <img class="image-holder" v-if=this.image :src="image"/>
                <p v-else > Image Preview</p>
            </div>
            <el-upload
                class="upload-demo"
                drag
                accept="image/png"
                action="api/upload-file"
                :on-success="successUpload"
                :on-error="showErrorDialog"
                :headers="this.headers"
                :file-list="fileList"
                 multiple
            >
                <i class="el-icon-upload"></i>
                <div class="el-upload__text">Drop file here or <em>click to upload</em></div>
                <div class="el-upload__tip" slot="tip">Only .png files are allowed and max file size is 2M</div>
            </el-upload>
        </el-form>
    </div>
</template>
<script>
import {Upload, Form, Button, Notification} from 'element-ui'


export default {
    components: {
        'el-upload': Upload,
        'el-form': Form,
        'el-button': Button
    },
    data() {
        return {
            test: '',
            file: '',
            image: '',
            fileList: [],
            headers: {
                'Accept': 'Application/json',
            }
        }
    },
    methods: {
        showErrorDialog(res, file) {
            if (res.status === 413) {
                Notification({type: 'error', title: 'Error', message: 'Max File size allowed is 2M'});
            }
        },
        successUpload(res, file) {
            console.log(res);
            if (res.status === 'success') {
                this.image = res.url
                console.log(this.image)
                console.log(res.url)
                Notification({type: 'success', title: 'Success', message: 'File Uploaded successfully'});
            }

        }
    }
}
</script>
<style scoped>

.centered {
    margin: auto;
    width: 50%;
    padding: 100px;
    text-align: center;
    color: gray;
}
.image-holder {
    height: 100%;
    width: 100%;
}
.image-preview{
    width: 50%;
    margin-left: auto;
    margin-right: auto;
    border-style: dashed;
    border-color: gray;
    text-align: center;
    height: 300px;
    margin-bottom: 20px;
}
.image-preview p {
    text-align: center;
    margin-top: 130px
}
</style>
