<template>
    <el-row
        :gutter="24"
        v-loading.fullscreen.lock="loading.status">
        <el-col :sm="8" :md="6" class="text-left">
            <label>Tài khoản</label>
            <el-input size="mini" placeholder="Nhập tên..." v-model="dataSearch.key"></el-input>
        </el-col>
        <el-col :sm="8" :md="4" style="text-align:center">
            <label style="color: transparent">Tìm kiếm</label>
            <el-button type="success" size="mini" @click.prevent="layDanhSachNguoiDung()" class="d-block">Tìm kiếm
            </el-button>
        </el-col>
        <el-col :span="24" class="mt-3">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="datatable table-bordered table hover-table">
                            <thead class="thead-light">
                            <tr>
                                <th>STT</th>
                                <th>Họ tên</th>
                                <th>Số điện thoại</th>
                                <th>Vai trò</th>
                                <th>Trạng thái</th>
                                <th>Ngày đăng ký</th>
                                <th>Hành động</th>
                            </tr>
                            </thead>
                            <tbody v-if="list_data&&list_data.length">
                            <tr v-for="(item,index) in list_data" :key="index">
                                <td class="text-center">{{ (paging.currentPage - 1) * paging.limit + index + 1 }}</td>
                                <td>{{ item.name }}</td>
                                <td>{{ item.email }}</td>
                                <td>{{ item.role == 0 ? 'Người dùng' : item.role == 1?'Quản trị viên':'Đại lý bán hàng' }}</td>
                                <td>{{ item.trang_thai == 0 ? 'Bị khóa' : 'Đang hoạt động' }}</td>
                                <td>{{ item.created_at }}</td>
                                <td class="text-center">
                                    <el-button @click.prevent="showUpdatePass(item)" size="mini" type="primary">
                                        Đổi mật khẩu
                                    </el-button>
                                    <!--                                    <el-button @click.prevent="showUpdate(item)" size="mini" type="warning">-->
                                    <!--                                        Chỉnh sửa-->
                                    <!--                                    </el-button>-->
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
                title="Cập nhật mật khẩu"
                :visible.sync="show_update_pass"
                custom-class="minWidth375"
                :before-close="handleClose">
                <div>
                    <el-row :gutter="24">
                        <!--                        <el-col :sm="24" :md="8" class="text-left">-->
                        <!--                            <label>Mật khẩu hiện tại</label>-->
                        <!--                            <el-input v-model="infoUpdatePass.mat_khau" placeholder="Nhập..."></el-input>-->
                        <!--                        </el-col>-->
                        <el-col :sm="24" :md="12" class="text-left">
                            <label>Mật khẩu mới</label>
                            <el-input type="password" show-password maxlength="20" v-model="matKhauMoi.matKhau"
                                      placeholder="Nhập..."></el-input>
                        </el-col>
                        <el-col :sm="24" :md="12" class="text-left">
                            <label>Nhập lại mật khẩu mới</label>
                            <el-input type="password" show-password maxlength="20" v-model="matKhauMoi.nhapLai"
                                      placeholder="Nhập..."></el-input>
                        </el-col>
                    </el-row>
                </div>
                <span slot="footer" class="dialog-footer">
    <el-button @click="show_update_pass = false" size="mini">Đóng</el-button>
    <el-button type="primary" size="mini" @click="confirmUpdatePass()">Cập nhật</el-button>
  </span>
            </el-dialog>

            <el-dialog
                title="Chỉnh sửa thông tin người dùng"
                :visible.sync="show_update"
                custom-class="minWidth375"
                width="70%"
                :before-close="handleClose">
                <div>
                    <el-row :gutter="24">

                        <el-col :sm="24" :md="6" class="text-left mt-4">
                            <label>Họ & tên:</label>
                            <el-input disabled type="text" v-model="infoUpdate.name" placeholder="Nhập..."></el-input>
                        </el-col>
                        <el-col :sm="24" :md="6" class="text-left mt-4">
                            <label>Email:</label>
                            <el-input disabled type="text" v-model="infoUpdate.email" placeholder="Nhập..."></el-input>
                        </el-col>
                        <el-col :sm="24" :md="6" class="text-left mt-4">
                            <label>Ngân hàng: </label>
                            <el-input type="text" v-model="infoUpdate.profiles.ngan_hang"
                                      placeholder="Nhập..."></el-input>
                        </el-col>
                        <el-col :sm="24" :md="6" class="text-left mt-4">
                            <label>Số tài khoản: {{ infoUpdate.profiles.so_tai_khoan }} </label>
                            <el-input type="text" v-model="infoUpdate.profiles.so_tai_khoan"
                                      placeholder="Nhập..."></el-input>
                        </el-col>
                        <el-col :sm="24" :md="6" class="text-left mt-4">
                            <label>Chủ tài khoản:</label>
                            <el-input type="text" v-model="infoUpdate.profiles.chu_tai_khoan"
                                      placeholder="Nhập..."></el-input>
                        </el-col>
                        <el-col :sm="24" :md="6" class="text-left mt-4">
                            <label>Số dư hiện tại:</label>
                            <el-input disabled v-model="infoUpdate.profiles.so_du" placeholder="Nhập..."></el-input>
                        </el-col>
                        <el-col :sm="24" :md="6" class="text-left mt-4">
                            <label>Số dư phát sinh:</label>
                            <el-input type="number" v-model="infoUpdate.profiles.phatSinh"
                                      placeholder="Nhập..."></el-input>
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
            list_user: [],
            list_data: [],
            dataSearch: {
                key: '',
                user: ''
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
            infoUpdatePass: {},
            infoUpdate: {
                profiles: {}
            },
            matKhauMoi: {
                matKhau: '',
                nhapLai: ''
            }
        }
    },
    mounted() {
        console.log('Mounted User Manage...');
        this.layDanhSachNguoiDung();
        // this.layDanhSachLichSuGiaoDich();
    },
    methods: {
        handleClose() {
            this.show_update = false;
            this.show_update_pass = false;
        },
        confirmUpdate() {

            console.log(this.infoUpdate)
            this.$confirm('Xác nhận cập nhật thông tin ?', 'Thông báo', {
                confirmButtonText: 'Đồng ý',
                cancelButtonText: 'Hủy',
            })
                .then(_ => {
                    var url = '/admin/update-info'
                    this.loading.status = true;
                    this.loading.text = 'Loading...'
                    let params = {
                        user_id: this.infoUpdate.id,
                        phatSinh: this.infoUpdate.profiles.phatSinh,
                        ngan_hang: this.infoUpdate.profiles.ngan_hang,
                        so_tai_khoan: this.infoUpdate.profiles.so_tai_khoan,
                        chu_tai_khoan: this.infoUpdate.profiles.chu_tai_khoan,
                        id: this.infoUpdate.profiles.id,
                    }
                    rest_api.post(url, params).then(
                        response => {
                            if (response.data.rc == 0) {
                                this.layDanhSachNguoiDung()
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
        confirmUpdatePass() {
            console.log(this.infoUpdatePass)
            if (!this.matKhauMoi.matKhau || this.matKhauMoi.matKhau == '') {
                this.thongBao('error', 'Vui lòng nhập mật khẩu mới.')
                return;
            }
            if (this.matKhauMoi.matKhau != this.matKhauMoi.nhapLai) {
                this.thongBao('error', 'Mật khẩu nhập lại không chính xác')
                return;
            }
            this.$confirm('Xác nhận cập nhật thông tin ?', 'Thông báo', {
                confirmButtonText: 'Đồng ý',
                cancelButtonText: 'Hủy',
            })
                .then(_ => {
                    var url = '/admin/update-pass'
                    this.loading.status = true;
                    this.loading.text = 'Loading...'
                    let params = {
                        user_id: this.infoUpdatePass.id,
                        mat_khau: this.matKhauMoi.matKhau,
                    }
                    rest_api.post(url, params).then(
                        response => {
                            if (response.data.rc == 0) {
                                this.thongBao('success', response.data.rd)
                            } else {
                                this.thongBao('error', response.data.rd)
                            }
                            this.show_update_pass = false;
                            this.loading.status = false;
                        }
                    ).catch((e) => {
                    })
                })
                .catch(_ => {
                });
        },
        showUpdatePass(item) {
            this.infoUpdatePass = JSON.parse(JSON.stringify(item));
            this.show_update_pass = true;
        },
        showUpdate(item) {
            this.infoUpdate = JSON.parse(JSON.stringify(item));
            if (this.infoUpdate.profiles == null) {
                this.infoUpdate.profiles = {
                    so_du: 0,
                    tong_thuong: 0,
                    phatSinh: 0,
                }
            }
            this.show_update = true;
        },
        updateTrangThai(id, stt) {
            var url = '/admin/update-status-user'
            this.loading.status = true;
            this.loading.text = 'Loading...'
            rest_api.post(url, {id: id, trang_thai: stt}).then(
                response => {
                    if (response.data.rc == 0) {
                        this.layDanhSachNguoiDung()
                        this.thongBao('success', 'Thay đổi trạng thái thành công')
                    } else {
                        this.thongBao('error', response.data.rd)
                    }
                    this.loading.status = false;
                }
            ).catch((e) => {
            })
        },
        showDelete(item) {
            this.$confirm('Xác nhận xoá thông tin ?', 'Thông báo', {
                confirmButtonText: 'Đồng ý',
                cancelButtonText: 'Hủy',
            })
                .then(_ => {
                    var url = '/admin/delete-user'
                    this.loading.status = true;
                    this.loading.text = 'Loading...'
                    rest_api.post(url, {id: item.id}).then(
                        response => {
                            if (response.data.rc == 0) {
                                this.layDanhSachNguoiDung()
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
        layDanhSachNguoiDung() {
            this.handleClose()
            let params = {
                start: this.paging.start,
                limit: this.paging.limit,
                key: this.dataSearch.key
            }
            var url = '/admin/list-user'
            this.loading.status = true;
            this.loading.text = 'Loading...'
            this.list_data = [];
            rest_api.post(url, params).then(
                response => {
                    if (response.data.rc == 0) {
                        this.paging.total = response.data.total
                        this.thongBao('success', 'Lấy dữ liệu thành công')
                        this.list_data = response.data.data;
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
            this.layDanhSachNguoiDung()
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
