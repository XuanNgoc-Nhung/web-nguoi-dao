<template>
    <el-row
        :gutter="24"
        v-loading.fullscreen.lock="loading.status">
        <el-col :sm="8" :md="6" class="text-left">
            <label>Tên</label>
            <el-input placeholder="Nhập tên..." v-model="dataSearch.key"></el-input>
        </el-col>
        <el-col :sm="8" :md="6" class="text-left">
            <label>Danh mục</label>
            <el-select clearable filterable style="width: 100%" v-model="dataSearch.danh_muc" placeholder="Chọn">
                <el-option
                    v-for="item in danh_sach_danh_muc"
                    :key="item.id"
                    :label="item.ten"
                    :value="item.id">
                </el-option>
            </el-select>
        </el-col>
        <el-col :sm="8" :md="6" class="text-left">
            <label>Cửa hàng</label>
            <el-select clearable filterable style="width: 100%" v-model="dataSearch.cua_hang" placeholder="Chọn">
                <el-option
                    v-for="item in danh_sach_cua_hang"
                    :key="item.id"
                    :label="item.ten_cua_hang"
                    :value="item.id">
                </el-option>
            </el-select>
        </el-col>
        <el-col :sm="8" :md="4" style="text-align:center">
            <label style="color: transparent">Tìm kiếm</label>
            <el-button type="success" @click.prevent="layDanhSachVatPham()" class="d-block">Tìm kiếm
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
                                <th>Tên</th>
                                <th>Danh mục</th>
                                <th>Cửa hàng</th>
                                <th>Giá</th>
                                <th>Khuyến mại</th>
                                <th>Đơn vị</th>
                                <th class="text-center">Mô tả</th>
                                <th class="text-center">Chi tiết</th>
                                <th style="min-width:250px">Hình ảnh</th>
                                <th>Tình trạng</th>
                                <th>Hành động</th>
                            </tr>
                            </thead>
                            <tbody v-if="list_data&&list_data.length">
                            <tr v-for="(item,index) in list_data" :key="index">
                                <td class="text-center">{{ (paging.currentPage - 1) * paging.limit + index + 1 }}</td>
                                <td>{{ item.ten }}</td>
                                <td>{{ item.the_loai ? item.the_loai.ten : '' }}</td>
                                <td>{{ item.chu_cua_hang ? item.chu_cua_hang.ten_cua_hang : '' }}</td>
                                <td>{{ item.gia.toLocaleString() }}</td>
                                <td>{{ item.khuyen_mai.toLocaleString() }}</td>
                                <td>{{ item.don_vi }}</td>
                                <td class="text-center">
                                    <el-button type="success" @click.prevent="xemMoTa(item.mo_ta)">Xem</el-button>
                                </td>
                                <td class="text-center">
                                    <el-button type="success" @click.prevent="xemMoTa(item.chi_tiet)">Xem</el-button>
                                </td>
                                <td>
                                    <div v-if="item.hinh_anh">
                                        <el-carousel height="150px">
                                            <el-carousel-item v-for="item in convertHinhAnh(item.hinh_anh)" :key="item">
                                                <el-image :src="item"></el-image>
                                            </el-carousel-item>
                                        </el-carousel>
                                    </div>
                                </td>
                                <td>{{ item.trang_thai }}</td>
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
                width="80%"
                :before-close="handleClose">
                <div>
                    <el-row :gutter="24">
                        <el-col :sm="12" :md="8" class="text-left mt-4">
                            <label>Tên sản phẩm:</label>
                            <el-input type="text" v-model="infoAdd.ten" placeholder="Nhập..."></el-input>
                        </el-col>
                        <el-col :sm="12" :md="8" class="text-left mt-4">
                            <label>Danh mục:</label>
                            <el-select clearable filterable style="width: 100%" v-model="infoAdd.danh_muc"
                                       placeholder="Chọn">
                                <el-option
                                    v-for="item in danh_sach_danh_muc"
                                    :key="item.id"
                                    :label="item.ten"
                                    :value="item.id">
                                </el-option>
                            </el-select>
                        </el-col>
                        <el-col :sm="12" :md="8" class="text-left mt-4">
                            <label>Cửa hàng:</label>
                            <el-select clearable filterable style="width: 100%" v-model="infoAdd.cua_hang"
                                       placeholder="Chọn">
                                <el-option
                                    v-for="item in danh_sach_cua_hang"
                                    :key="item.id"
                                    :label="item.chu.name"
                                    :value="item.id">
                                </el-option>
                            </el-select>
                        </el-col>
                        <el-col :sm="12" :md="4" class="text-left mt-4">
                            <label>Giá sản phẩm:</label>
                            <el-input type="number" v-model="infoAdd.gia" placeholder="Nhập..."></el-input>
                        </el-col>
                        <el-col :sm="12" :md="4" class="text-left mt-4">
                            <label>Khuyến mại:</label>
                            <el-input type="number" v-model="infoAdd.khuyen_mai" placeholder="Nhập..."></el-input>
                        </el-col>
                        <el-col :sm="12" :md="4" class="text-left mt-4">
                            <label>Đơn vị tính:</label>
                            <el-input type="text" v-model="infoAdd.don_vi" placeholder="Nhập..."></el-input>
                        </el-col>
                        <el-col :sm="12" :md="4" class="text-left mt-4">
                            <label>Trạng thái:</label>
                            <el-select clearable filterable style="width: 100%" v-model="infoAdd.trang_thai"
                                       placeholder="Chọn">
                                <el-option
                                    v-for="item in danh_sach_trang_thai"
                                    :key="item.vlue"
                                    :label="item.name"
                                    :value="item.value">
                                </el-option>
                            </el-select>
                        </el-col>
                        <el-col :span="24" class="mt-3">
                            <div class="source d-flex">
                                <ul class="el-upload-list el-upload-list--picture-card " style="display: contents">
                                    <template v-for="(link,i) in listFileUpload">
                                        <li tabindex="0" class="el-upload-list__item is-ready" :key="i">
                                            <div>
                                                <img v-if="link.type == 1" :src="link.link" alt=""
                                                     style="height:144px !important"
                                                     class="el-upload-list__item-thumbnail">
                                                <span class="el-upload-list__item-actions">
                                        <span class="el-upload-list__item-delete" @click.prevent="removeUpload(link,i)">
                                          <i class="el-icon-delete"/>
                                        </span>
                                      </span>
                                            </div>
                                        </li>
                                    </template>
                                    <li>
                                        <div class="">
                                            <el-upload ref="uploadShop" :show-file-list="false" :on-change="uploadFile"
                                                       accept=".jpg,.png,.jpeg,.jfif" action="/" :auto-upload="false">
                                                <div tabindex="0" class="el-upload el-upload--picture-card"><i
                                                    class="el-icon-plus"/></div>
                                            </el-upload>
                                        </div>
                                    </li>

                                </ul>
                            </div>
                        </el-col>
                        <el-col :span="24" class="pt-5">
                            <label for="">Mô tả</label>
                            <vue-editor v-model="infoAdd.mo_ta"/>
                        </el-col>
                        <el-col :span="24" class="pt-5">
                            <label for="">Chi tiết</label>
                            <vue-editor v-model="infoAdd.chi_tiet"/>
                        </el-col>
                    </el-row>
                </div>
                <span slot="footer" class="dialog-footer">
                <el-button @click="show_add = false" size="mini">Đóng</el-button>
                <el-button type="primary" size="mini" @click="confirmAdd()">Thêm mới</el-button>
              </span>
            </el-dialog>
            <el-dialog
                title="Chỉnh sửa vật phẩm"
                :visible.sync="show_update"
                top="5vh"
                custom-class="minWidth375"
                width="80%"
                :before-close="handleClose">
                <div>
                    <el-row :gutter="24">
                        <el-col :sm="12" :md="8" class="text-left mt-4">
                            <label>Tên sản phẩm:</label>
                            <el-input type="text" v-model="infoUpdate.ten" placeholder="Nhập..."></el-input>
                        </el-col>
                        <el-col :sm="12" :md="8" class="text-left mt-4">
                            <label>Danh mục:</label>
                            <el-select clearable filterable style="width: 100%" v-model="infoUpdate.danh_muc"
                                       placeholder="Chọn">
                                <el-option
                                    v-for="item in danh_sach_danh_muc"
                                    :key="item.id"
                                    :label="item.ten"
                                    :value="item.id">
                                </el-option>
                            </el-select>
                        </el-col>
                        <el-col :sm="12" :md="8" class="text-left mt-4">
                            <label>Cửa hàng:</label>
                            <el-select clearable filterable style="width: 100%" v-model="infoUpdate.cua_hang"
                                       placeholder="Chọn">
                                <el-option
                                    v-for="item in danh_sach_cua_hang"
                                    :key="item.id"
                                    :label="item.chu.name"
                                    :value="item.id">
                                </el-option>
                            </el-select>
                        </el-col>
                        <el-col :sm="12" :md="4" class="text-left mt-4">
                            <label>Giá sản phẩm:</label>
                            <el-input type="number" v-model="infoUpdate.gia" placeholder="Nhập..."></el-input>
                        </el-col>
                        <el-col :sm="12" :md="4" class="text-left mt-4">
                            <label>Khuyến mại:</label>
                            <el-input type="number" v-model="infoUpdate.khuyen_mai" placeholder="Nhập..."></el-input>
                        </el-col>
                        <el-col :sm="12" :md="4" class="text-left mt-4">
                            <label>Đơn vị tính:</label>
                            <el-input type="text" v-model="infoUpdate.don_vi" placeholder="Nhập..."></el-input>
                        </el-col>
                        <el-col :sm="12" :md="8" class="text-left mt-4">
                            <label>Trạng thái:</label>
                            <el-select clearable filterable style="width: 100%" v-model="infoUpdate.trang_thai"
                                       placeholder="Chọn">
                                <el-option
                                    v-for="item in danh_sach_trang_thai"
                                    :key="item.vlue"
                                    :label="item.name"
                                    :value="item.value">
                                </el-option>
                            </el-select>
                        </el-col>
                        <el-col :span="24" class="mt-3">
                            <div class="source d-flex">
                                <ul class="el-upload-list el-upload-list--picture-card " style="display: contents">
                                    <template v-for="(link,i) in listFileUpload">
                                        <li tabindex="0" class="el-upload-list__item is-ready" :key="i">
                                            <div>
                                                <img v-if="link.type == 1" :src="link.link" alt=""
                                                     style="height:144px !important"
                                                     class="el-upload-list__item-thumbnail">
                                                <span class="el-upload-list__item-actions">
                                        <span class="el-upload-list__item-delete" @click.prevent="removeUpload(link,i)">
                                          <i class="el-icon-delete"/>
                                        </span>
                                      </span>
                                            </div>
                                        </li>
                                    </template>
                                    <li>
                                        <div class="">
                                            <el-upload ref="uploadShop" :show-file-list="false" :on-change="uploadFile"
                                                       accept=".jpg,.png,.jpeg,.jfif" action="/" :auto-upload="false">
                                                <div tabindex="0" class="el-upload el-upload--picture-card"><i
                                                    class="el-icon-plus"/></div>
                                            </el-upload>
                                        </div>
                                    </li>

                                </ul>
                            </div>
                        </el-col>
                        <el-col :span="24" class="pt-5">
                            <label for="">Mô tả</label>
                            <vue-editor v-model="infoUpdate.mo_ta"/>
                        </el-col>
                        <el-col :span="24" class="pt-5">
                            <label for="">Chi tiết</label>
                            <vue-editor v-model="infoUpdate.chi_tiet"/>
                        </el-col>
                    </el-row>
                </div>
                <span slot="footer" class="dialog-footer">
                <el-button @click="show_update = false" size="mini">Đóng</el-button>
                <el-button type="primary" size="mini" @click="confirmUpdate()">Chỉnh sửa</el-button>
              </span>
            </el-dialog>
            <!--            Mô tả-->
            <el-dialog
                title="Mô tả"
                :visible.sync="show_mo_ta"
                fullscreen
                :before-close="handleClose">
                <el-row :gutter="24">
                    <el-col :span="24">

                        <div v-html="noiDungMoTa"></div>
                    </el-col>
                </el-row>
                <span slot="footer" class="dialog-footer">
    <el-button @click="show_mo_ta = false" size="mini" type="danger">Đóng</el-button>
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
import {VueEditor} from "vue2-editor";

Vue.use(VueEditor);
Vue.use(ElementUI);
Vue.use(Icon);
export default {
    components: {
        PhanTrang,
        VueEditor,
    },
    data() {
        return {

            slickOptions: {
                //options can be used from the plugin documentation
                slidesToShow: 4,
                infinite: true,
                accessibility: true,
                adaptiveHeight: false,
                arrows: true,
                dots: true,
                draggable: true,
                edgeFriction: 0.30,
                swipe: true
            },
            list_data: [],
            danh_sach_danh_muc: [],
            danh_sach_cua_hang: [],
            danh_sach_trang_thai: [
                {name: 'Còn hàng', value: 1},
                {name: 'Hết hàng', value: 0},
            ],
            dataSearch: {
                key: '',
                danh_muc: '',
                cua_hang: ''
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
            show_update: false,
            show_add: false,
            show_mo_ta: false,
            noiDungMoTa: '',
            listFileUpload: [],
            dataForm: [],
            infoAdd: {
                danh_muc: '',
                ten: '',
                cua_hang: '',
                gia: '',
                khuyen_mai: '',
                don_vi: 'Kg',
                trang_thai: 1,
                mo_ta: '',
            },
            infoUpdate: {}
        }
    },
    mounted() {
        console.log('Mounted User Manage...');
        this.layDanhSachDanhMuc();
        this.layDanhSachCuaHang();
        this.layDanhSachVatPham();
    },
    methods: {
        xemMoTa(noiDung) {
            console.log('Xem mô tả')
            this.noiDungMoTa = noiDung;
            this.show_mo_ta = true;
        },
        convertHinhAnh(item) {
            let data = JSON.parse(item);
            return data;
            console.log('convertHinhAnh')
            console.log(JSON.parse(data))
            for (let i = 0; i < data.length; i++) {
                console.log(data[i])
            }
        },
        removeUpload(item, index) {
            if (item && item.status && item.status === 'saved') {
                this.listFileUpload.splice(index, 1)
            } else {
                this.$refs.uploadShop.clearFiles()
                this.$refs.uploadShop.value = null
                this.listFileUpload.splice(index, 1)
                this.dataForm.splice(index, 1)
            }
        },
        uploadFile(file, fileList) {
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
                }
            })

            this.$refs.uploadShop.clearFiles()
            this.$refs.uploadShop.value = null
        },
        confirmAdd() {
            this.$confirm('Xác nhận thêm mới thông tin ?', 'Thông báo', {
                confirmButtonText: 'Đồng ý',
                cancelButtonText: 'Hủy',
            })
                .then(_ => {
                    this.loading.status = true;
                    this.loading.text = 'Loading...'
                    var dataForm = new FormData()
                    dataForm.append('danh_muc', this.infoAdd.danh_muc)
                    dataForm.append('ten', this.infoAdd.ten)
                    dataForm.append('cua_hang', this.infoAdd.cua_hang)
                    dataForm.append('gia', this.infoAdd.gia)
                    dataForm.append('khuyen_mai', this.infoAdd.khuyen_mai)
                    dataForm.append('don_vi', this.infoAdd.don_vi)
                    dataForm.append('trang_thai', this.infoAdd.trang_thai)
                    dataForm.append('mo_ta', this.infoAdd.mo_ta)
                    dataForm.append('chi_tiet', this.infoAdd.chi_tiet)
                    if (this.dataForm && this.dataForm.length) {
                        Array
                            .from(Array(this.dataForm.length).keys())
                            .map(x => {
                                dataForm.append('hinh_anh[]', this.dataForm[x], this.dataForm[x].name)
                            })
                    }
                    rest_api.post('/admin/them-vat-pham', dataForm).then(
                        response => {
                            if (response && response.data.rc == 0) {
                                this.layDanhSachVatPham()
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
            this.show_mo_ta = false;
        },
        showUpdate(item) {
            console.log('showUpdate')
            console.log(item)
            this.dataForm = [];
            this.listFileUpload = [];
            if (item.hinh_anh) {
                let hinh_anh = JSON.parse(item.hinh_anh)
                for (let i = 0; i < hinh_anh.length; i++) {
                    this.listFileUpload.push({
                        type: 1,
                        link: hinh_anh[i]
                    })
                }
            }
            this.infoUpdate = JSON.parse(JSON.stringify(item));
            this.show_update = true;
            // this.$refs.uploadShop.clearFiles()
            // this.$refs.uploadShop.value = null
        },
        confirmUpdate() {
            this.$confirm('Xác nhận thêm mới thông tin ?', 'Thông báo', {
                confirmButtonText: 'Đồng ý',
                cancelButtonText: 'Hủy',
            })
                .then(_ => {
                    this.loading.status = true;
                    this.loading.text = 'Loading...'
                    var dataForm = new FormData()
                    dataForm.append('id', this.infoUpdate.id)
                    dataForm.append('danh_muc', this.infoUpdate.danh_muc)
                    dataForm.append('ten', this.infoUpdate.ten)
                    dataForm.append('cua_hang', this.infoUpdate.cua_hang)
                    dataForm.append('gia', this.infoUpdate.gia)
                    dataForm.append('khuyen_mai', this.infoUpdate.khuyen_mai)
                    dataForm.append('don_vi', this.infoUpdate.don_vi)
                    dataForm.append('trang_thai', this.infoUpdate.trang_thai)
                    dataForm.append('mo_ta', this.infoUpdate.mo_ta)
                    dataForm.append('chi_tiet', this.infoUpdate.chi_tiet)
                    if (this.dataForm && this.dataForm.length) {
                        Array
                            .from(Array(this.dataForm.length).keys())
                            .map(x => {
                                dataForm.append('hinh_anh[]', this.dataForm[x], this.dataForm[x].name)
                            })
                    }
                    rest_api.post('/admin/chinh-sua-vat-pham', dataForm).then(
                        response => {
                            if (response && response.data.rc == 0) {
                                this.layDanhSachVatPham()
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
                start: 0,
                limit: 999,
                key: '',
                child: true
            }
            var url = '/admin/danh-sach-danh-muc'
            this.loading.status = true;
            this.loading.text = 'Loading...'
            this.danh_sach_danh_muc = [];
            rest_api.post(url, params).then(
                response => {
                    if (response.data.rc == 0) {
                        this.danh_sach_danh_muc = response.data.data;
                    } else {
                    }
                    this.loading.status = false;
                }
            ).catch((e) => {
            })
        },
        layDanhSachVatPham() {
            this.handleClose()
            let params = {
                start: this.paging.start,
                limit: this.paging.limit,
                key: this.dataSearch.key,
                cua_hang: this.dataSearch.cua_hang,
                danh_muc: this.dataSearch.danh_muc,
            }
            var url = '/admin/danh-sach-vat-pham'
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
        layDanhSachCuaHang() {
            this.handleClose()
            let params = {
                start: 0,
                limit: 999,
                key: ''
            }
            var url = '/admin/danh-sach-cua-hang'
            this.loading.status = true;
            this.loading.text = 'Loading...'
            this.danh_sach_cua_hang = [];
            rest_api.post(url, params).then(
                response => {
                    if (response.data.rc == 0) {
                        this.danh_sach_cua_hang = response.data.data;
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
<style lang="scss" scoped>

.el-upload-list--picture-card .el-upload-list__item {
    width: 220px;
}

.modal-dialog {
    width: 50% !important;
    min-width: 370px;
    max-width: 100%;
}

.modal.show .modal-dialog {
    margin: 0 auto;
}

.imgShow {
    width: 100%;
    max-height: 70vh;
}

.avatar-upload {
    position: relative;
    max-width: 205px;
    margin: 10px auto;
}

.avatar-upload .avatar-edit {
    position: absolute;
    right: 12px;
    z-index: 1;
    top: 10px;
}

.avatar-upload .avatar-edit input {
    display: none;
}

.avatar-upload .avatar-edit input + label {
    display: inline-block;
    width: 34px;
    height: 34px;
    margin-bottom: 0;
    border-radius: 100%;
    background: #FFFFFF;
    border: 1px solid transparent;
    box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
    cursor: pointer;
    font-weight: normal;
    transition: all 0.2s ease-in-out;
}

.avatar-upload .avatar-edit input + label:hover {
    background: #f1f1f1;
    border-color: #d6d6d6;
}

.avatar-upload .avatar-preview {
    width: 150px;
    height: 150px;
    position: relative;
    border-radius: 100%;
    border: 6px solid #F8F8F8;
    box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
}

.avatar-upload .avatar-preview > img {
    width: 100%;
    height: 100%;
    border-radius: 100%;
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
}

.widget-profile .profile-info-widget .booking-doc-img {
    background-color: white;
}

.fa-arrow-circle-up:before {
    content: "\f0aa";
}

.widget-profile .profile-info-widget .booking-doc-img img {
    width: 100%;
    height: 100%;
}

.profile-cover-avatar {
    border: none;
    width: 150px !important;
    height: 170px !important;
}

.profile-detail {
    display: flex;
    align-items: center;
}

.min-w-850 {
    min-width: 850px;
}

.el-col {
    padding-top: 12px;
}

label {
    margin: 0;
    padding: 0;
}

.el-carousel__item h3 {
    color: #475669;
    font-size: 14px;
    opacity: 0.75;
    line-height: 150px;
    margin: 0;
}

.el-carousel__item:nth-child(2n) {
    background-color: #99a9bf;
}

.el-carousel__item:nth-child(2n+1) {
    background-color: #d3dce6;
}
</style>
