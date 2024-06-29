<template>
    <el-row
        :gutter="24"
        v-loading.fullscreen.lock="loading.status">
        <el-col :sm="8" :md="6" class="text-left">
            <label>Danh mục hàng hóa</label>
            <el-input size="mini" placeholder="Nhập tên..." v-model="dataSearch.key"></el-input>
        </el-col>
        <el-col :sm="8" :md="4" style="text-align:center">
            <label style="color: transparent">Tìm kiếm</label>
            <el-button type="success" size="mini" @click.prevent="layDanhSachDanhMuc()" class="d-block">Tìm kiếm
            </el-button>
        </el-col>
        <el-col :span="24" class="mt-3">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="text-right pb-2">
                            <el-button @click="showThemMoi()" size="mini" type="primary">Thêm mới</el-button>
                        </div>
                        <table class="datatable table-bordered table hover-table">
                            <thead class="thead-light">
                            <tr>
                                <th>STT</th>
                                <th>Avatar</th>
                                <th>Tên danh mục</th>
                                <th>Thuộc danh mục</th>
                                <th>Ngày tạo</th>
                                <th>Hành động</th>
                            </tr>
                            </thead>
                            <tbody v-if="list_data&&list_data.length">
                            <tr v-for="(item,index) in list_data" :key="index">
                                <td class="text-center">{{ (paging.currentPage - 1) * paging.limit + index + 1 }}</td>
                                <td class="text-center">
                                    <div v-if="item.avatar">
                                        <el-image style="width: 30px" :src="item.avatar"></el-image>
                                    </div>
                                </td>
                                <td>{{ item.ten }}</td>
                                <td>{{ item.danh_muc_cha ? item.danh_muc_cha.ten : '' }}</td>
                                <td>{{ item.created_at }}</td>
                                <td class="text-center">
                                    <el-button @click.prevent="showUpdate(item)" size="mini" type="warning">
                                        Chỉnh sửa
                                    </el-button>
                                    <el-button @click.prevent="showDelete(item)" size="mini" type="danger">
                                        Xoá
                                    </el-button>
                                </td>
                            </tr>
                            </tbody>
                            <tbody v-else>
                            <tr>
                                <td colspan="10" class="text-center">
                                    <p>Không có dữ liệu</p>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <PhanTrang v-show="paging.total>0" :tongbanghi="paging.total"
                                   :batdau="trangbatdau"
                                   @pageChange="layLai($event)">
                        </PhanTrang>
                    </div>
                </div>
            </div>
        </el-col>
        <el-col :span="24">
            <el-dialog
                title="Thêm mới danh mục vật phẩm"
                :visible.sync="show_add"
                top="5vh"
                custom-class="minWidth375"
                width="70%"
                :before-close="handleClose">
                <div>
                    <el-row :gutter="24">
                        <el-col :sm="24" :md="12" class="text-left mt-4">
                            <label>Tên:</label>
                            <el-input type="text" v-model="infoAdd.ten" placeholder="Nhập..."></el-input>
                        </el-col>
                        <el-col :sm="24" :md="12" class="text-left mt-4">
                            <label>Danh mục cha:</label>
                            <el-select clearable  filterable style="width: 100%" v-model="infoAdd.id_cha" placeholder="Chọn">
                                <el-option
                                    v-for="item in danh_sach_danh_muc_cha"
                                    :key="item.id"
                                    :label="item.ten"
                                    :value="item.id">
                                </el-option>
                            </el-select>
                        </el-col>
                        <el-col :span="24" class="pt-5">
                            <label for="">Hình ảnh</label>
                            <div class="source d-flex">
                                <ul class="el-upload-list el-upload-list--picture-card " style="display: contents">
                                    <template
                                        v-for="(link,i) in listFileUpload"
                                    >
                                        <li
                                            tabindex="0"
                                            class="el-upload-list__item is-ready"
                                        >
                                            <div class="w-100 h-100">
                                                <img
                                                    :src="link.link"
                                                    alt=""
                                                    class="el-upload-list__item-thumbnail"
                                                >
                                            </div>
                                        </li>
                                    </template>
                                    <li>
                                        <div class="">
                                            <el-upload
                                                ref="uploadShop"
                                                :show-file-list="false"
                                                :on-change="uploadFile"
                                                accept=".jpeg,jfif,.jpg,.png"
                                                action="/"
                                                :auto-upload="false"
                                            >
                                                <div
                                                    tabindex="0"
                                                    class="el-upload el-upload--picture-card"
                                                >
                                                    <i
                                                        class="el-icon-plus"
                                                    /></div>
                                            </el-upload>
                                        </div>
                                    </li>

                                </ul>

                            </div>
                        </el-col>
                    </el-row>
                </div>
                <span slot="footer" class="dialog-footer">
                <el-button @click="show_add = false" size="mini">Đóng</el-button>
                <el-button type="primary" size="mini" @click="confirmAdd()">Thêm mới</el-button>
              </span>
            </el-dialog>
            <el-dialog
                title="Chỉnh sửa thông tin danh mục vật phẩm"
                :visible.sync="show_update"
                top="5vh"
                custom-class="minWidth375"
                width="70%"
                :before-close="handleClose">
                <div>
                    <el-row :gutter="24">
                        <el-col :sm="24" :md="12" class="text-left mt-4">
                            <label>Tên:</label>
                            <el-input type="text" v-model="infoUpdate.ten" placeholder="Nhập..."></el-input>
                        </el-col>
                        <el-col :sm="24" :md="12" class="text-left mt-4">
                            <label>Danh mục cha:</label>
                            <el-select clearable  filterable style="width: 100%" v-model="infoUpdate.id_cha" placeholder="Chọn">
                                <el-option
                                    v-for="item in danh_sach_danh_muc_cha"
                                    :key="item.id"
                                    :label="item.ten"
                                    :value="item.id">
                                </el-option>
                            </el-select>
                        </el-col>
                        <el-col :span="24" class="pt-5">
                            <label for="">Hình ảnh</label>
                            <div class="source d-flex">
                                <ul class="el-upload-list el-upload-list--picture-card " style="display: contents">
                                    <template
                                        v-for="(link,i) in listFileUpload"
                                    >
                                        <li
                                            tabindex="0"
                                            class="el-upload-list__item is-ready"
                                        >
                                            <div class="w-100 h-100">
                                                <img
                                                    :src="link.link"
                                                    alt=""
                                                    class="el-upload-list__item-thumbnail"
                                                >
                                            </div>
                                        </li>
                                    </template>
                                    <li>
                                        <div class="">
                                            <el-upload
                                                ref="uploadShop"
                                                :show-file-list="false"
                                                :on-change="uploadFile"
                                                accept=".jpeg,jfif,.jpg,.png"
                                                action="/"
                                                :auto-upload="false"
                                            >
                                                <div
                                                    tabindex="0"
                                                    class="el-upload el-upload--picture-card"
                                                >
                                                    <i
                                                        class="el-icon-plus"
                                                    /></div>
                                            </el-upload>
                                        </div>
                                    </li>

                                </ul>

                            </div>
                        </el-col>
                    </el-row>
                </div>
                <span slot="footer" class="dialog-footer">
                <el-button @click="show_update = false" size="mini">Đóng</el-button>
                <el-button type="primary" size="mini" @click="confirmUpdate()">Chỉnh sửa</el-button>
              </span>
            </el-dialog>
        </el-col>
    </el-row>
</template>
<script>
import rest_api from "../../api/rest_api";
import Vue from 'vue';
import ElementUI from 'element-ui';
import PhanTrang from "../Ui/phanTrang";
import {
    Icon
} from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css';

Vue.use(ElementUI);
Vue.use(Icon);
export default {
    components: {
        PhanTrang
    },
    data() {
        return {
            list_data: [],
            dataSearch: {
                key: '',
            },
            loading: {
                status: false,
                text: 'Loading...'
            },
            trangbatdau: false,
            paging: {
                total: 0,
                start: 0,
                limit: 10,
                currentPage: 1
            },
            show_update_pass: false,
            show_update: false,
            show_add: false,
            listFileUpload: [],
            danh_sach_danh_muc_cha: [],
            dataForm: [],
            infoAdd: {
                id_cha: '',
                ten: 'Tên',
            },
            infoUpdate: {}
        }
    },
    mounted() {
        console.log('Mounted User Manage...');
        this.layDanhSachDanhMuc();
        // this.layDanhSachLichSuGiaoDich();
    },
    methods: {

        uploadFile(file, fileList) {
            this.listFileUpload = [];
            this.dataForm = [];
            fileList.forEach((item, x) => {
                const typeImage = /(png|jpg|jfif|jpeg)$/i
                if (item.raw) {
                    if (typeImage.exec(item.raw.type)) {
                        this.listFileUpload.push({
                            type: 1,
                            link: URL.createObjectURL(item.raw)
                        })
                        this.dataForm.push(item.raw)
                    }
                } else {
                    this.thongBao('error', 'Vui lòng chọn đúng định dạng hình ảnh')
                }
            })
            this.$refs.uploadShop.clearFiles()
            this.$refs.uploadShop.value = null
        }, confirmAdd() {
            this.$confirm('Xác nhận thêm mới thông tin ?', 'Thông báo', {
                confirmButtonText: 'Đồng ý',
                cancelButtonText: 'Hủy',
            })
                .then(_ => {
                    this.loading.status = true;
                    this.loading.text = 'Loading...'
                    var dataForm = new FormData()
                    dataForm.append('ten', this.infoAdd.ten)
                    dataForm.append('id_cha', this.infoAdd.id_cha)
                    if (this.dataForm && this.dataForm.length) {
                        Array
                            .from(Array(this.dataForm.length).keys())
                            .map(x => {
                                dataForm.append('hinh_anh', this.dataForm[x], this.dataForm[x].name)
                            })
                    }
                    rest_api.post('/admin/them-danh-muc', dataForm).then(
                        response => {
                            if (response && response.data.rc == 0) {
                                this.layDanhSachDanhMuc()

                                this.thongBao('success', response.data.rd)
                            } else {
                                this.thongBao('error', response.data.rd)
                            }
                            this.loading.status = false;
                        }
                    ).catch((e) => {
                    })
                })
                .catch(_ => {
                });
        },
        showThemMoi() {
            this.show_add = true;
        },
        handleClose() {
            this.show_update = false;
            this.show_add = false;
        },
        showUpdate(item) {
            console.log('showUpdate')
            console.log(item)
            this.listFileUpload = [];
            if (item.avatar) {
                this.listFileUpload = [{
                    link: item.avatar,
                    type: 1
                }]
            }
            this.infoUpdate = JSON.parse(JSON.stringify(item));
            this.show_update = true;
        },

        confirmUpdate() {
            console.log(this.infoUpdate)
            this.$confirm('Xác nhận cập nhật thông tin ?', 'Thông báo', {
                confirmButtonText: 'Đồng ý',
                cancelButtonText: 'Hủy',
            })
                .then(_ => {
                    this.loading.status = true;
                    this.loading.text = 'Loading...'
                    var dataForm = new FormData()
                    dataForm.append('id', this.infoUpdate.id)
                    dataForm.append('ten', this.infoUpdate.ten)
                    dataForm.append('id_cha', this.infoUpdate.id_cha)
                    if (this.dataForm && this.dataForm.length) {
                        Array
                            .from(Array(this.dataForm.length).keys())
                            .map(x => {
                                dataForm.append('hinh_anh', this.dataForm[x], this.dataForm[x].name)
                            })
                    }
                    rest_api.post('/admin/update-danh-muc', dataForm).then(
                        response => {
                            if (response && response.data.rc == 0) {
                                this.layDanhSachDanhMuc()
                                this.thongBao('success', response.data.rd)
                            } else {
                                this.thongBao('error', response.data.rd)
                            }
                            this.loading.status = false;
                        }
                    ).catch((e) => {
                    })
                })
                .catch(_ => {
                });
        },
        showDelete(item) {
            this.$confirm('Xác nhận xoá thông tin ?', 'Thông báo', {
                confirmButtonText: 'Đồng ý',
                cancelButtonText: 'Hủy',
            })
                .then(_ => {
                    var url = '/admin/xoa-danh-muc'
                    this.loading.status = true;
                    this.loading.text = 'Loading...'
                    rest_api.post(url, {id: item.id}).then(
                        response => {
                            if (response.data.rc == 0) {
                                this.layDanhSachDanhMuc()
                                this.thongBao('success', 'Xoá dữ liệu thành công')
                            } else {
                                this.thongBao('error', response.data.rd)
                            }
                            this.loading.status = false;
                        }
                    ).catch((e) => {
                    })
                })
                .catch(_ => {
                });
        },
        layDanhSachDanhMuc() {
            this.handleClose()
            let params = {
                start: this.paging.start,
                limit: this.paging.limit,
                key: this.dataSearch.key
            }
            var url = '/admin/danh-sach-danh-muc'
            this.loading.status = true;
            this.loading.text = 'Loading...'
            this.list_data = [];
            rest_api.post(url, params).then(
                response => {
                    if (response.data.rc == 0) {
                        this.paging.total = response.data.total
                        this.thongBao('success', 'Lấy dữ liệu thành công')
                        this.list_data = response.data.data;
                        this.danh_sach_danh_muc_cha = [];
                        for (let i = 0; i < this.list_data.length; i++) {
                            if (!this.list_data[i].id_cha || this.list_data[i].id_cha == '') {
                                this.danh_sach_danh_muc_cha.push(this.list_data[i])
                            }
                        }
                    } else {
                        this.paging.total = 0
                    }
                    this.loading.status = false;
                }
            ).catch((e) => {
            })
        },
        layLai(e) {
            console.log('onPagingClick')
            this.paging.start = e.start;
            this.paging.limit = e.limit;
            this.paging.currentPage = e.currentPage;
            this.layDanhSachDanhMuc()
        },
        thongBao(typeNoty, msgNoty) {
            let msg = "";
            let cl = "";
            if (msgNoty) {
                msg = msgNoty;
            }
            let type = "success";
            if (typeNoty) {
                type = typeNoty
            }
            if (type == "success") {
                cl = "dts-noty-success"
            }
            if (type == "warning") {
                cl = "dts-noty-warning"
            }
            if (type == "error") {
                cl = "dts-noty-error"
            }
            if (type == "info") {
                cl = "dts-noty-info"
            }
            this.$message({
                customClass: cl,
                showClose: true,
                message: msg,
                type: type,
                duration: 3000
            });
        },
    }
}

</script>
<style scoped="scoped">
th {
    text-align: center;
}
</style>
