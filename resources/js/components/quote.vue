<template>
    <section class="quote-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="quote-image"></div>
                    </div>

                    <div class="col-lg-6">
                        <div class="quote-form">
                            <div class="content">
                                <span>Get Free Quote</span>
                                <h3>Getting Movers And Packers Quotes Easy</h3>
                            </div>

                            <form>
                                <div class="row">
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="Name" placeholder="Your Name">
                                        </div>
                                    </div>
        
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="Email" placeholder="Your Email">
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-sm-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Moving From">
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-sm-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Moving To">
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-sm-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Transport Type">
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-sm-6">
                                        <div class="form-group">
                                            <div class="input-group date" id="datetimepicker">
                                                <input type="text" class="form-control" placeholder="mm/dd/yyyy">
                                                <span class="input-group-addon"></span>
                                            </div>	
                                            <i class='bx bx-calendar'></i>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-12 col-sm-12">
                                        <div class="form-group">
                                            <select>
                                                <option value="">Move Type</option>
                                                <option value="">Private Local</option>
                                                <option value="">Private Regional</option>
                                                <option value="">Business Local</option>
                                                <option value="">Business Regional</option>
                                            </select>	
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <textarea name="message" class="form-control" placeholder="Write Message"></textarea>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12">
                                        <div class="quote-btn">
                                            <button type="submit" class="default-btn">
                                                Send Request
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
</template>
<script>
export default {
    name:'quote',
}
</script>